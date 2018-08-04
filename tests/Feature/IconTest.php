<?php

namespace Tests\Feature;

use App\User;
use App\Icon;
use Tests\TestCase;

class IconTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Icon */
    protected $icon;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->icon = factory(Icon::class)->create();
    }

    /** @test */
    public function search_icon()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/icons/search?q=icon_name')
            ->assertSuccessful();
    }

    /** @test */
    public function get_icons()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/icons')
            ->assertSuccessful();
    }

    /** @test */
    public function get_icon()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/icons/' . $this->icon->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_icon()
    {
        $this->actingAs($this->user)
            ->postJson('/api/settings/icons', [
                'name' => 'icon_name',
                'class' => 'icon icon_name',
                'markup' => '<i class="icon icon_name"></i>'
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('icons', [
            'name' => 'icon_name',
            'class' => 'icon icon_name',
            'markup' => '<i class="icon icon_name"></i>'
        ]);
    }

    /** @test */
    public function edit_icon()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/icons/' . $this->icon->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_icon()
    {
        $this->actingAs($this->user)
            ->patchJson('/api/settings/icons/' . $this->icon->id, [
                'name' => 'updated_icon_name',
                'class' => 'updated_icon updated_icon_name',
                'markup' => '<i class="updated_icon updated_icon_name"></i>'
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('icons', [
            'name' => 'updated_icon_name',
            'class' => 'updated_icon updated_icon_name',
            'markup' => '<i class="updated_icon updated_icon_name"></i>'
        ]);
    }

    /** @test */
    public function delete_icon()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/settings/icons/' . $this->icon->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('icons', [
            'id' => $this->icon->id
        ]);
    }
}
