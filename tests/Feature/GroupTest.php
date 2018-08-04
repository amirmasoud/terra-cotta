<?php

namespace Tests\Feature;

use App\User;
use App\Icon;
use App\Safe;
use App\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Group */
    protected $group;

    /** @var \App\Icon */
    protected $icon;

    /** @var \App\Safe */
    protected $safe;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->group = factory(Group::class)->create();

        $this->icon = factory(Icon::class)->create();

        $this->safe = factory(Safe::class)->create();
    }

    /** @test */
    public function search_group()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/groups/search?q=group_name')
            ->assertSuccessful();
    }

    /** @test */
    public function get_groups()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/groups')
            ->assertSuccessful();
    }

    /** @test */
    public function get_group()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/groups/' . $this->group->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_group()
    {
        $this->actingAs($this->user)
            ->postJson('/api/settings/groups', [
                'name' => 'group_name',
                'icon_id' => $this->icon->id,
                'safe_id' => $this->safe->id,
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('groups', [
            'name' => 'group_name',
            'icon_id' => $this->icon->id,
            'safe_id' => $this->safe->id,
        ]);
    }

    /** @test */
    public function edit_group()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/groups/' . $this->group->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_group()
    {
        $icon = factory(Icon::class)->create();
        $safe = factory(Safe::class)->create();

        $this->actingAs($this->user)
            ->patchJson('/api/settings/groups/' . $this->group->id, [
                'name' => 'updated_group_name',
                'icon_id' => $icon->id,
                'safe_id' => $safe->id,
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('groups', [
            'name' => 'updated_group_name',
            'icon_id' => $icon->id,
            'safe_id' => $safe->id,
        ]);
    }

    /** @test */
    public function delete_group()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/settings/groups/' . $this->group->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('groups', [
            'id' => $this->group->id
        ]);
    }
}
