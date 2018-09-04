<?php

namespace Tests\Feature;

use App\User;
use App\Icon;
use App\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Icon */
    protected $category;

    /** @var \App\Icon */
    protected $icon;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        \Artisan::call('db:seed', ['--class' => 'RolesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'PermissionsTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'RoleHasPermissionTableSeeder']);
        $this->user->assignRole('admin');

        $this->category = factory(Category::class)->create();

        $this->icon = factory(Icon::class)->create();
    }

    /** @test */
    public function search_category()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/categories/search?q=category_name')
            ->assertSuccessful();
    }

    /** @test */
    public function get_categories()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/categories')
            ->assertSuccessful();
    }

    /** @test */
    public function get_category()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/categories/' . $this->category->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_category()
    {
        $this->actingAs($this->user)
            ->postJson('/api/settings/categories', [
                'name' => 'category_name',
                'icon_id' => $this->icon->id
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('categories', [
            'name' => 'category_name',
            'icon_id' => $this->icon->id
        ]);
    }

    /** @test */
    public function edit_category()
    {
        $this->actingAs($this->user)
            ->getJson('/api/settings/categories/' . $this->category->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_category()
    {
        $icon = factory(Icon::class)->create();

        $this->actingAs($this->user)
            ->patchJson('/api/settings/categories/' . $this->category->id, [
                'name' => 'updated_category_name',
                'icon_id' => $icon->id
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('categories', [
            'name' => 'updated_category_name',
            'icon_id' => $icon->id
        ]);
    }

    /** @test */
    public function delete_category()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/settings/categories/' . $this->category->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('categories', [
            'id' => $this->category->id
        ]);
    }
}
