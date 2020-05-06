<?php

namespace Tests\Feature;

use App\Tag;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class TagTest extends TestCase implements ResourceInterface
{
    use Resource;

    /** @var \App\Tag */
    protected $tag;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'name', 'color'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/tags/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'tags';

    public function setUp()
    {
        parent::setUp();

        $this->tag = factory(Tag::class)->create();
    }

    /**
     * @group tags
     */
    public function testSearchTags()
    {
        $this->search(self::BASE_URL . 'search?q=tag_name');
    }

    /**
     * @group tags
     */
    public function testPaginatedTags()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group tags
     */
    public function testSingleTag()
    {
        $this->single(self::BASE_URL . $this->tag->id);
    }

    /**
     * @group tags
     */
    public function testCreateTag()
    {
        $data = [
            'name' => 'tag_name',
            'color' => '#FFF'
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group tags
     */
    public function testEditTag()
    {
        $this->edit(self::BASE_URL . $this->tag->id . '/edit');
    }

    /**
     * @group tags
     */
    public function testUpdateTag()
    {
        $data = [
            'name' => 'update_tag_name',
            'color' => '#000'
        ];

        $this->update(self::BASE_URL . $this->tag->id, $data, self::TABLE);
    }

    /**
     * @group tags
     */
    public function testDestroyTag()
    {
        $data = [
            'id' => $this->tag->id
        ];

        $this->destroy(self::BASE_URL . $this->tag->id, $data, self::TABLE);
    }
}
