<?php

namespace Tests\Feature;

use App\Tag;
use App\Type;
use App\Safe;
use App\User;
use App\Category;
use Tests\TestCase;

class SafeTest extends TestCase
{
    /** @var \App\User */
    protected $user;

    /** @var \App\Safe */
    protected $safe;

    /** @var \App\Category */
    protected $category;

    /** @var \App\Tag */
    protected $tag;

    /** @var \App\Type */
    protected $type;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->safe = factory(Safe::class)->create();

        $this->category = factory(Category::class)->create();

        $this->tag = factory(Tag::class)->create();

        $this->type = factory(Type::class)->create();
    }

    /** @test */
    public function search_safe()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/search?q=safe_name')
            ->assertSuccessful();
    }

    /** @test */
    public function get_safes()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes')
            ->assertSuccessful();
    }

    /** @test */
    public function get_safe()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/' . $this->safe->id)
            ->assertSuccessful();
    }

    /** @test */
    public function create_safe()
    {
        $this->actingAs($this->user)
            ->postJson('/api/safes', [
                'name' => 'safe_name',
                'categories' => [$this->category->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name',
        ]);

        $this->actingAs($this->user)
            ->postJson('/api/safes', [
                'name' => 'safe_name',
                'categories' => ['New Category']
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name',
        ]);

        $this->actingAs($this->user)
            ->postJson('/api/safes', [
                'name' => 'safe_name_with_tags',
                'categories' => [$this->category->name],
                'tags' => [$this->tag->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_tags',
        ]);

        $this->actingAs($this->user)
            ->postJson('/api/safes', [
                'name' => 'safe_name_with_create_tags',
                'categories' => [$this->category->name],
                'tags' => ['New Tag']
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_create_tags',
        ]);

        $this->actingAs($this->user)
            ->postJson('/api/safes', [
                'name' => 'safe_name_with_tags_and_groups',
                'categories' => [$this->category->name],
                'tags' => [$this->tag->name],
                'groups' => [['name' => 'group 1'], ['name' => 'group 2']]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_tags_and_groups',
        ]);

        $this->actingAs($this->user)
            ->postJson('/api/safes', [
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
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_tags_and_groups_and_fields',
        ]);
    }

    /** @test */
    public function get_safes_by_category_id()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/?category=' . $this->category->id)
            ->assertSuccessful();
    }

    /** @test */
    public function edit_safe()
    {
        $this->actingAs($this->user)
            ->getJson('/api/safes/' . $this->safe->id . '/edit')
            ->assertSuccessful();
    }

    /** @test */
    public function update_safe()
    {
        $category = factory(Category::class)->create();

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'updated_safe_name',
                'categories' => [$category->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'updated_safe_name',
        ]);

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'safe_name',
                'categories' => [$this->category->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name',
        ]);

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'safe_name',
                'categories' => ['New Category']
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name',
        ]);

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'safe_name_with_tags',
                'categories' => [$this->category->name],
                'tags' => [$this->tag->name]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_tags',
        ]);

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'safe_name_with_create_tags',
                'categories' => [$this->category->name],
                'tags' => ['New Tag']
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_create_tags',
        ]);

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
                'name' => 'safe_name_with_tags_and_groups',
                'categories' => [$this->category->name],
                'tags' => [$this->tag->name],
                'groups' => [['name' => 'group 1'], ['name' => 'group 2']]
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_tags_and_groups',
        ]);

        $this->actingAs($this->user)
            ->patchJson('/api/safes/' . $this->safe->id, [
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
            ])
            ->assertSuccessful();

        $this->assertDatabaseHas('safes', [
            'name' => 'safe_name_with_tags_and_groups_and_fields',
        ]);
    }

    /** @test */
    public function delete_safe()
    {
        $this->actingAs($this->user)
            ->deleteJson('/api/safes/' . $this->safe->id)
            ->assertSuccessful();

        $this->assertDatabaseMissing('safes', [
            'id' => $this->safe->id
        ]);
    }
}
