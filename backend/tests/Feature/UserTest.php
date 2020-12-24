<?php

namespace Tests\Feature;

use App\Icon;
use App\Models\User;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class UserTest extends TestCase implements ResourceInterface
{
    use Resource;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name', 'email', 'photo_url', 'roles'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/users/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'users';

    /**
     * @group users
     */
    public function testSearchUsers()
    {
        $this->search(self::BASE_URL . 'search?q=user_name');
    }

    /**
     * @group users
     */
    public function testPaginatedUsers()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group users
     */
    public function testSingleUser()
    {
        $this->single(self::BASE_URL . $this->user->id);
    }

    /**
     * @group users
     */
    public function testCreateUser()
    {
        $data = [
            'name' => 'user_name',
            'email' => 'email@passwords.test',
            'password' => 'updated_password',
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
        $this->assertTrue(\Hash::check('updated_password', User::whereEmail('email@passwords.test')->first()->password));
    }

    /**
     * @group users
     */
    public function testEditUser()
    {
        $this->edit(self::BASE_URL . $this->user->id . '/edit');
    }

    /**
     * @group users
     */
    public function testUpdateUser()
    {
        $data = [
            'name' => 'updated_user_name',
            'email' => 'new_email@passwords.test',
            'password' => 'updated_password',
        ];

        $this->update(self::BASE_URL . $this->user->id, $data, self::TABLE);
        $this->assertTrue(\Hash::check('updated_password', User::whereEmail('new_email@passwords.test')->first()->password));
    }

    /**
     * @group users
     */
    public function testDestroyUser()
    {
        $data = [
            'id' => $this->user->id
        ];

        $this->destroy(self::BASE_URL . $this->user->id, $data, self::TABLE);
    }
}
