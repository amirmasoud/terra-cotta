<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Type;
use App\Safe;
use App\Models\User;
use App\Models\Category;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class SafeTest extends TestCase implements ResourceInterface
{
    use Resource;

    /** @var \App\Safe */
    protected $safe;

    /** @var \App\Models\Category */
    protected $category;

    /** @var \App\Models\Tag */
    protected $tag;

    /** @var \App\Type */
    protected $type;

    public function setUp()
    {
        parent::setUp();

        $this->safe = factory(Safe::class)->create();
        $this->category = factory(Category::class)->create();
        $this->tag = factory(Tag::class)->create();
        $this->type = factory(Type::class)->create();
    }

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name', 'categories', 'tags', 'groups'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/safes/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'safes';

    /**
     * @group safes
     */
    public function testSearchSafes()
    {
        $this->search(self::BASE_URL . 'search?q=safe_name');
    }

    /**
     * @group safes
     */
    public function testPaginatedSafes()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group safes
     */
    public function testSingleSafe()
    {
        $this->single(self::BASE_URL . $this->category->id);
    }

    /**
     * @group safes
     */
    public function testCreateSafeWithTakenCategory()
    {
        $data = [
            'name' => 'safe_name',
            'categories' => [$this->category->name]
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group safes
     */
    public function testCreateSafeWithNewCategory()
    {
        $data = [
            'name' => 'safe_name',
            'categories' => ['New Category']
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group safes
     */
    public function testCreateSafeWithTakenCategoryAndNewTag()
    {
        $data = [
            'name' => 'safe_name_with_create_tags',
            'categories' => [$this->category->name],
            'tags' => ['New Tag']
        ];

        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group safes
     */
    public function testCreateSafeWithTakenCategoryAndTagAndNewGroups()
    {
        $data = [
            'name' => 'safe_name_with_tags_and_groups',
            'categories' => [$this->category->name],
            'tags' => [$this->tag->name],
            'groups' => [['name' => 'group 1'], ['name' => 'group 2']]
        ];

        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group safes
     */
    public function testCreateSafeWithTakenCategoryAndTagAndNewGroupsAndFields()
    {
        $data = [
            'name' => 'safe_name_with_tags_and_groups_and_fields',
            'categories' => [$this->category->name],
            'tags' => [$this->tag->name],
            'groups' => [
                [
                    'name' => 'group 1',
                    'fields' => [
                        [
                            'label' => 'Label 1 - group 1',
                            'value' => 'Value 1 - group 1',
                            'type' => $this->type->id
                        ]
                    ]
                ],
                [
                    'name' => 'group 2',
                    'fields' => [
                        [
                            'label' => 'Label 1 - group 1',
                            'value' => 'Value 1 - group 1',
                        ]
                    ]
                ]
            ]
        ];

        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group safes
     */
    public function testEditSafe()
    {
        $this->edit(self::BASE_URL . $this->safe->id . '/edit');
    }

    /**
     * @group safes
     */
    public function testUpdateSafe()
    {
        $data = [
            'name' => 'updated_safe_name',
            'categories' => [$this->category->name]
        ];

        $this->update(self::BASE_URL . $this->safe->id, $data, self::TABLE);
    }

    /**
     * @group safes
     */
    public function testDestroySafe()
    {
        $data = [
            'id' => $this->safe->id
        ];

        $this->destroy(self::BASE_URL . $this->safe->id, $data, self::TABLE);
    }
}
