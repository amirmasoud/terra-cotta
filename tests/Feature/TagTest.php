<?php

namespace Tests\Feature;

use App\Tag;
use App\User;
use Tests\TestCase;

class TagTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Tag */
    protected $tag;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        \Artisan::call('db:seed', ['--class' => 'RolesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'PermissionsTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'RoleHasPermissionTableSeeder']);
        $this->user->assignRole('admin');

        $this->tag = factory(Tag::class)->create();
    }

    /** @test */
    public function search_tag()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/tags/search?q=tag_name')
            ->assertSuccessful();
    }

    /** @test */
    public function get_tags()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/tags')
            ->assertSuccessful();
    }

    /** @test */
    public function get_tag()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/tags/' . $this->tag->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_tag()
    {
        $this->actingAs($this->user)
            ->postJson('/api/settings/tags', [
                'name' => 'tag_name',
                'color' => '#FFF'
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('tags', [
            'name' => 'tag_name',
            'color' => '#FFF'
        ]);
    }

    /** @test */
    public function edit_tag()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/tags/' . $this->tag->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_tag()
    {
        $this->actingAs($this->user)
            ->patchJson('/api/settings/tags/' . $this->tag->id, [
                'name' => 'updated_tag_name',
                'color' => '#000',
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('tags', [
            'name' => 'updated_tag_name',
            'color' => '#000',
        ]);
    }

    /** @test */
    public function delete_tag()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/settings/tags/' . $this->tag->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('tags', [
            'id' => $this->tag->id
        ]);
    }
}
