<?php

namespace Tests\Feature;

use App\Safe;
use App\Icon;
use App\Group;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class GroupTest extends TestCase implements ResourceInterface
{
    use Resource;

    /** @var \App\Group */
    protected $group;

    /** @var \App\Icon */
    protected $icon;

    /** @var \App\Safe */
    protected $safe;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name', 'icon', 'safe'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/groups/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'groups';

    public function setUp()
    {
        parent::setUp();

        $this->group = factory(Group::class)->create();
        $this->icon = factory(Icon::class)->create();
        $this->safe = factory(Safe::class)->create();
    }

    /**
     * @group groups
     */
    public function testSearchCategories()
    {
        $this->search(self::BASE_URL . 'search?q=group_name');
    }

    /**
     * @group groups
     */
    public function testPaginatedCategories()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group groups
     */
    public function testSingleGroup()
    {
        $this->single(self::BASE_URL . $this->group->id);
    }

    /**
     * @group groups
     */
    public function testCreateGroup()
    {
        $data = [
            'name' => 'group_name',
            'icon_id' => factory(Icon::class)->create()->id,
            'safe_id' => factory(Safe::class)->create()->id,
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group groups
     */
    public function testEditGroup()
    {
        $this->edit(self::BASE_URL . $this->group->id . '/edit');
    }

    /**
     * @group groups
     */
    public function testUpdateGroup()
    {
        $data = [
            'name' => 'updated_group_name',
            'icon_id' => factory(Icon::class)->create()->id,
            'safe_id' => factory(Safe::class)->create()->id,
        ];

        $this->update(self::BASE_URL . $this->group->id, $data, self::TABLE);
    }

    /**
     * @group groups
     */
    public function testDestroyGroup()
    {
        $data = [
            'id' => $this->group->id
        ];

        $this->destroy(self::BASE_URL . $this->group->id, $data, self::TABLE);
    }
}

