<?php

namespace Tests\Feature;

use App\Type;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class TypeTest extends TestCase implements ResourceInterface
{
    use Resource;

    /** @var \App\Type */
    protected $type;

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
    public const BASE_URL = '/api/settings/types/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'types';

    public function setUp()
    {
        parent::setUp();

        $this->type = factory(Type::class)->create();
    }

    /**
     * @group types
     */
    public function testSearchTypes()
    {
        $this->search(self::BASE_URL . 'search?q=type_name');
    }

    /**
     * @group types
     */
    public function testPaginatedTypes()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group types
     */
    public function testSingleType()
    {
        $this->single(self::BASE_URL . $this->type->id);
    }

    /**
     * @group types
     */
    public function testCreateType()
    {
        $data = [
            'name' => 'type_name'
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group types
     */
    public function testEditType()
    {
        $this->edit(self::BASE_URL . $this->type->id . '/edit');
    }

    /**
     * @group types
     */
    public function testUpdateType()
    {
        $data = [
            'name' => 'update_type_name'
        ];

        $this->update(self::BASE_URL . $this->type->id, $data, self::TABLE);
    }

    /**
     * @group types
     */
    public function testDestroyType()
    {
        $data = [
            'id' => $this->type->id
        ];

        $this->destroy(self::BASE_URL . $this->type->id, $data, self::TABLE);
    }
}
