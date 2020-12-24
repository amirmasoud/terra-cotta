<?php

namespace Tests\Feature;

use App\Icon;
use App\Type;
use App\Safe;
use App\Group;
use App\Models\Field;
use Tests\TestCase;
use Tests\Traits\Resource;
use Tests\Interfaces\Resource as ResourceInterface;

class FieldTest extends TestCase implements ResourceInterface
{
    use Resource;

    /**
     * @var \App\Models\Field
     */
    protected $field;

    /**
     * @var \App\Icon
     */
    protected $icon;

    /**
     * Single JSON response structure.
     */
    public const SINGLE_STRUCTURE = [
        'data' => [
            'id', 'label', 'value', 'type', 'group', 'safe', 'icon'
        ]
    ];

    /**
     * Base API URL.
     */
    public const BASE_URL = '/api/settings/fields/';

    /**
     * Table to check (non)existance of data after create, update and delete.
     */
    public const TABLE = 'fields';

    public function setUp()
    {
        parent::setUp();

        $this->icon = factory(Icon::class)->create();
        $this->type = factory(Type::class)->create();
        $this->safe = factory(Safe::class)->create();
        $this->group = factory(Group::class)->create();
        $this->field = factory(Field::class)->create();
    }

    /**
     * @group fields
     */
    public function testPaginatedFields()
    {
        $this->paginated(self::BASE_URL);
    }

    /**
     * @group fields
     */
    public function testSingleField()
    {
        $this->single(self::BASE_URL . $this->field->id);
    }

    /**
     * @group fields
     */
    public function testCreateField()
    {
        $data = [
            'label' => 'field_label',
            'value' => 'field_value',
            'icon_id' => $this->icon->id,
            'type_id' => $this->type->id,
            'safe_id' => $this->safe->id,
            'group_id' => $this->group->id,
        ];
        $this->create(self::BASE_URL, $data, self::TABLE);
    }

    /**
     * @group fields
     */
    public function testEditField()
    {
        $this->edit(self::BASE_URL . $this->field->id . '/edit');
    }

    /**
     * @group fields
     */
    public function testUpdateField()
    {
        $data = [
            'label' => 'updated_field_label',
            'value' => 'updated_field_value',
            'icon_id' => $this->icon->id,
            'type_id' => $this->type->id,
            'safe_id' => $this->safe->id,
            'group_id' => $this->group->id,
        ];

        $this->update(self::BASE_URL . $this->field->id, $data, self::TABLE);
    }

    /**
     * @group fields
     */
    public function testDestroyField()
    {
        $data = [
            'id' => $this->field->id
        ];

        $this->destroy(self::BASE_URL . $this->field->id, $data, self::TABLE);
    }
}
