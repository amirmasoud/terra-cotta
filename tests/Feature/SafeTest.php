<?php

namespace Tests\Feature;

use App\Safe;
use App\User;
use App\Category;
use Tests\TestCase;

class SafeTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Safe */
    protected $safe;

    /** @var \App\Category */
    protected $category;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->safe = factory(Safe::class)->create();

        $this->category = factory(Category::class)->create();
    }

    /** @test */
    public function search_safe()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/search?q=safe_name')
            ->assertSuccessful();
    }

    /** @test */
    public function get_safes()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes')
            ->assertSuccessful();
    }

    /** @test */
    public function get_safe()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/' . $this->safe->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_safe()
    {
        $this->actingAs($this->user)
            ->postJson('/api/safes', [
                'name' => 'safe_name',
                'categories' => [$this->category->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name',
        ]);
    }

    /** @test */
    public function edit_safe()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/' . $this->safe->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_safe()
    {
        $category = factory(Category::class)->create();

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'updated_safe_name',
                'categories' => [$category->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'updated_safe_name',
        ]);
    }

    /** @test */
    public function delete_safe()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/safes/' . $this->safe->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('safes', [
            'id' => $this->safe->id
        ]);
    }
}
