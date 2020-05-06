<?php

namespace Tests\Traits;

trait Resource
{
    /**
     * Test searching a resource API response status code and structure.
     *
     * @param  string $url
     * @return void
     */
    public function search(string $url): void
    {
        $this->actingAs($this->user)
            ->getJson($url)
            ->assertSuccessful()
            ->assertJsonStructure(self::COLLECTION_STRUCTURE);
    }

    /**
     * Test paginated resource API response status code and structure.
     *
     * @param  string $url
     * @return void
     */
    public function paginated(string $url): void
    {
        // List paginated resource.
        $this->actingAs($this->user)
            ->getJson($url)
            ->assertSuccessful()
            ->assertJsonStructure(self::COLLECTION_STRUCTURE);

        // List all resources.
        $this->actingAs($this->user)
            ->getJson($url . '?per_page=-1')
            ->assertSuccessful()
            ->assertJsonStructure(self::COLLECTION_STRUCTURE);
    }

    /**
     * Test single resource API response status code and structure.
     *
     * @param  string $url
     * @return void
     */
    public function single(string $url): void
    {
        $this->actingAs($this->user)
            ->getJson($url)
            ->assertSuccessful()
            ->assertJsonStructure(self::SINGLE_STRUCTURE);
    }

    /**
     * Test create resource API response status code and database existance.
     *
     * @param  string $url
     * @param  array  $data
     * @param  string $table
     * @return void
     */
    public function create(string $url, array $data, string $table): void
    {
        $this->actingAs($this->user)
            ->postJson($url, $data)
            ->assertStatus(self::RESOURCE_CREATED_CODE)
            ->assertSuccessful();

        $data = collect($data)->reject(function ($value, $key) {
            return is_array($value);
        })->all();

        $this->assertDatabaseHas($table, $this->flatData($data));
    }

    /**
     * Test edit resource API response status code and structure.
     *
     * @param  string $url
     * @return void
     */
    public function edit(string $url): void
    {
        $this->actingAs($this->user)
            ->getJson($url)
            ->assertSuccessful()
            ->assertJsonStructure(self::SINGLE_STRUCTURE);
    }

    /**
     * Test update resource API response status code and database existance.
     * @param  string $url
     * @param  array $data
     * @param  string $table
     * @return void
     */
    public function update(string $url, array $data, string $table): void
    {
        $this->actingAs($this->user)
            ->patchJson($url, $data)
            ->assertStatus(self::RESOURCE_UPDATED_CODE)
            ->assertSuccessful();

        $this->assertDatabaseHas($table, $this->flatData($data));
    }

    /**
     * Test destroy resource API response status code.
     *
     * @param  string $url
     * @return void
     */
    public function destroy(string $url, array $data, string $table): void
    {
        $this->actingAs($this->user)
            ->deleteJson($url)
            ->assertStatus(self::RESOURCE_DELETED_CODE)
            ->assertSuccessful();

        $this->assertDatabaseMissing($table, $data);
    }

    public function flatData($data)
    {
        return collect($data)->reject(function ($value, $key) {
            return is_array($value) || $key == 'password';
        })->all();
    }
}
