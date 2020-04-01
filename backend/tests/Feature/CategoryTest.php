<?php

namespace Tests\Feature;

use App\Icon;
use App\Category;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class CategoryTest extends TestCase implements ResourceInterface
{
    use Resource;

    /**
     * @var \App\Category
     */
    protected $category;

    /**
     * @var \App\Icon
     */
    protected $icon;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name', 'icon'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/categories/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'categories';

    public function setUp()
    {
        parent::setUp();

        $this->category = factory(Category::class)->create();
        $this->icon = factory(Icon::class)->create();
    }

    /**
     * @group categories
     */
    public function testSearchCategories()
    {
        $this->search(self::BASE_URL . 'search?q=category_name');
    }

    /**
     * @group categories
     */
    public function testPaginatedCategories()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group categories
     */
    public function testSingleCategory()
    {
        $this->single(self::BASE_URL . $this->category->id);
    }

    /**
     * @group categories
     */
    public function testCreateCategory()
    {
        $data = [
            'name' => 'category_name',
            'icon_id' => $this->icon->id
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group categories
     */
    public function testEditCategory()
    {
        $this->edit(self::BASE_URL . $this->category->id . '/edit');
    }

    /**
     * @group categories
     */
    public function testUpdateCategory()
    {
        $data = [
            'name' => 'updated_category_name',
            'icon_id' => factory(Icon::class)->create()->id
        ];

        $this->update(self::BASE_URL . $this->category->id, $data, self::TABLE);
    }

    /**
     * @group categories
     */
    public function testDestroyCategory()
    {
        $data = [
            'id' => $this->category->id
        ];

        $this->destroy(self::BASE_URL . $this->category->id, $data, self::TABLE);
    }
}
