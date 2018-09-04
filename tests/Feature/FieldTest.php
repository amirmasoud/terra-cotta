<?php

namespace Tests\Feature;

use App\User;
use App\Icon;
use App\Type;
use App\Safe;
use App\Group;
use App\Field;
use Tests\TestCase;

class FieldTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Icon */
    protected $icon;

    /** @var \App\Type */
    protected $type;

    /** @var \App\Safe */
    protected $safe;

    /** @var \App\Group */
    protected $group;

    /** @var \App\Field */
    protected $field;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        \Artisan::call('db:seed', ['--class' => 'RolesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'PermissionsTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'RoleHasPermissionTableSeeder']);
        $this->user->assignRole('admin');

        $this->icon = factory(Icon::class)->create();

        $this->type = factory(Type::class)->create();

        $this->safe = factory(Safe::class)->create();

        $this->group = factory(Group::class)->create();

        $this->field = factory(Field::class)->create();
    }

    /** @test */
    public function get_fields()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/fields')
            ->assertSuccessful();
    }

    /** @test */
    public function get_field()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/fields/' . $this->field->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_field()
    {
        $this->actingAs($this->user)
            ->postJson('/api/settings/fields', [
                'label' => 'field_label',
                'value' => 'field_value',
                'icon_id' => $this->icon->id,
                'type_id' => $this->type->id,
                'safe_id' => $this->safe->id,
                'group_id' => $this->group->id,
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('fields', [
            'label' => 'field_label',
            'value' => 'field_value',
            'icon_id' => $this->icon->id,
            'type_id' => $this->type->id,
            'safe_id' => $this->safe->id,
            'group_id' => $this->group->id,
        ]);
    }

    /** @test */
    public function edit_field()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/fields/' . $this->field->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_field()
    {
        $icon = factory(Icon::class)->create();
        $type = factory(Type::class)->create();
        $safe = factory(Safe::class)->create();
        $group = factory(Group::class)->create();

        $this->actingAs($this->user)
            ->patchJson('/api/settings/fields/' . $this->field->id, [
                'label' => 'field_label_updated',
                'value' => 'field_value_updated',
                'icon_id' => $icon->id,
                'type_id' => $type->id,
                'safe_id' => $safe->id,
                'group_id' => $group->id,
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('fields', [
            'label' => 'field_label_updated',
            'value' => 'field_value_updated',
            'icon_id' => $icon->id,
            'type_id' => $type->id,
            'safe_id' => $safe->id,
            'group_id' => $group->id,
        ]);
    }

    /** @test */
    public function delete_field()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/settings/fields/' . $this->field->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('fields', [
            'id' => $this->field->id
        ]);
    }
}
