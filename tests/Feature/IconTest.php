<?php

namespace Tests\Feature;

use App\Icon;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class IconTest extends TestCase implements ResourceInterface
{
    use Resource;

    /**
     * @var \App\Icon
     */
    protected $icon;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name', 'class', 'prefix'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/icons/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'icons';

    public function setUp()
    {
        parent::setUp();

        $this->icon = factory(Icon::class)->create();
    }

    /**
     * @group icons
     */
    public function testSearchCategories()
    {
        $this->search(self::BASE_URL . 'search?q=icon_name');
    }

    /**
     * @group icons
     */
    public function testPaginatedCategories()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group icons
     */
    public function testSingleIcon()
    {
        $this->single(self::BASE_URL . $this->icon->id);
    }

    /**
     * @group icons
     */
    public function testCreateIcon()
    {
        $data = [
            'name' => 'icon_name',
            'class' => 'icon icon_name',
            'prefix' => 'fas'
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group icons
     */
    public function testEditIcon()
    {
        $this->edit(self::BASE_URL . $this->icon->id . '/edit');
    }

    /**
     * @group icons
     */
    public function testUpdateIcon()
    {
        $data = [
            'name' => 'update_icon_name',
            'class' => 'update-icon icon_name',
            'prefix' => 'update-fas'
        ];

        $this->update(self::BASE_URL . $this->icon->id, $data, self::TABLE);
    }

    /**
     * @group icons
     */
    public function testDestroyIcon()
    {
        $data = [
            'id' => $this->icon->id
        ];

        $this->destroy(self::BASE_URL . $this->icon->id, $data, self::TABLE);
    }
}

