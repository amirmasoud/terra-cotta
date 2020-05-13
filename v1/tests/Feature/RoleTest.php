<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Tests\Traits\Resource;
use Spatie\Permission\Models\Permission;
use Tests\Interfaces\Resource as ResourceInterface;

class RoleTest extends TestCase implements ResourceInterface
{
    use Resource;

    /**
     * @var \App\Role
     */
    protected $role;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/roles/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'roles';

    public function setUp()
    {
        parent::setUp();

        $this->role = factory(Role::class)->create();
    }

    /**
     * @group roles
     */
    public function testSearchCategories()
    {
        $this->search(self::BASE_URL . 'search?q=role_name');
    }

    /**
     * @group roles
     */
    public function testPaginatedCategories()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group roles
     */
    public function testSingleRole()
    {
        $this->single(self::BASE_URL . $this->role->id);
    }

    /**
     * @group roles
     */
    public function testCreateRole()
    {
        $data = [
            'name' => 'role_name'
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group roles
     */
    public function testEditRole()
    {
        $this->edit(self::BASE_URL . $this->role->id . '/edit');
    }

    /**
     * @group roles
     */
    public function testUpdateRole()
    {
        $data = [
            'name' => 'updated_role_name'
        ];

        $this->update(self::BASE_URL . $this->role->id, $data, self::TABLE);
    }

    /**
     * @group roles
     */
    public function testDestroyRole()
    {
        $data = [
            'id' => $this->role->id
        ];

        $this->destroy(self::BASE_URL . $this->role->id, $data, self::TABLE);
    }
}

