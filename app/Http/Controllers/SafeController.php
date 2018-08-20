<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Type;
use App\Safe;
use App\Field;
use App\Group;
use App\Category;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Safe\IndexRequest;
use App\Http\Requests\Safe\CreateRequest;
use App\Http\Requests\Safe\UpdateRequest;
use App\Http\Requests\Safe\SearchRequest;

use App\Http\Resources\SafeCollection;
use App\Http\Resources\Safe as SafeResource;

class SafeController extends Controller
{
    private $content;

    /**
     * Constructor of the class.
     *
     * @param \App\Contracts\Content $content
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
        $this->content->model = Safe::with('categories', 'tags', 'groups',
            'groups.fields', 'groups.fields.type', 'categories.icon');
    }

    /**
     * Show paginated safes.
     *
     * @return JSON
     */
    public function index(IndexRequest $request)
    {
        return new SafeCollection($this->content->index($request));
    }

    /**
     * Create new safe.
     *
     * @param  \App\Http\Requests\Safe\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        $safe = $this->content->store($request);

        // Attach categories
        if ($request->categories) {
            foreach ($request->categories as $categoryName) {
                if (Category::whereName($categoryName)->exists()) {
                    $category = Category::whereName($categoryName)
                                 ->first();
                } else {
                    $category = Category::create(['name' => $categoryName]);
                }
                $safe->categories()->attach($category->id);
            }
        }

        // Attach tags
        if ($request->tags) {
            foreach ($request->tags as $tagName) {
                if (Tag::whereName($tagName)->exists()) {
                    $tag = Tag::whereName($tagName)
                                 ->first();
                } else {
                    $tag = Tag::create(['name' => $tagName, 'color' => '#ffffff']);
                }
                $safe->tags()->attach($tag->id);
            }
        }

        // Create and save groups and fields
        if ($request->groups) {
            foreach ($request->groups as $g) {
                $group = $safe->groups()->create($g);
                if (array_key_exists('fields', $g)) {
                    foreach ($g['fields'] as $f) {
                        $field = new Field($f);
                        $field->type_id = $f['type']['id'] ?? Type::default()->id;
                        $field->group_id = $group->id;
                        $safe->fields()->save($field);
                    }
                }
            }
        }

        return response(null, 201);
    }

    /**
     * Show an safe.
     *
     * @param  \App\Safe $safe
     * @return JSON
     */
    public function show(Safe $safe)
    {
        return new SafeResource(
            $this->content->show($safe)
                ->load('categories', 'tags', 'groups', 'groups.fields',
                       'groups.fields.type', 'categories.icon')
        );
    }

    /**
     * Show single safe for edit.
     *
     * @param  \App\Safe $safe
     * @return JSON
     */
    public function edit(Safe $safe)
    {
        return new SafeResource(
            $this->content->show($safe)
                ->load('categories', 'tags', 'groups', 'groups.fields',
                       'groups.fields.type', 'categories.icon')
        );
    }

    /**
     * Update an safe.
     *
     * @param  \App\Http\Requests\Safe\UpdateRequest $request
     * @param  \App\Safe $safe
     * @return JSON
     */
    public function update(UpdateRequest $request, Safe $safe)
    {
        $safe->update($request->all());

        // Sync categories
        if ($request->categories) {
            $categories = [];
            foreach ($request->categories as $categoryName) {
                if (Category::whereName($categoryName)->exists()) {
                    $categories[] = Category::whereName($categoryName)
                                            ->first()
                                            ->id;
                } else {
                    $category = Category::create(['name' => $categoryName]);
                    $categories[] = $category->id;
                }
            }
            $safe->categories()->sync($categories);
        }

        // Attach tags
        if ($request->tags) {
            $tags = [];
            foreach ($request->tags as $tagName) {
                if (Tag::whereName($tagName)->exists()) {
                    $tags[] = Tag::whereName($tagName)
                                 ->first()
                                 ->id;
                } else {
                    $tag = Tag::create(['name' => $tagName, 'color' => '#ffffff']);
                    $tags[] = $tag->id;
                }
            }
            $safe->tags()->sync($tags);
        }

        // Create and save groups and fields
        // @TODO: Find difference instead of deleting
        $safe->groups()->delete();
        $safe->fields()->delete();
        if ($request->groups) {
            foreach ($request->groups as $g) {
                $group = $safe->groups()->create($g);
                if (array_key_exists('fields', $g)) {
                    foreach ($g['fields'] as $f) {
                        $field = new Field($f);
                        $field->type_id = $f['type']['id'] ?? Type::default()->id;
                        $field->group_id = $group->id;
                        $safe->fields()->save($field);
                    }
                }
            }
        }

        return response(null, 204);
    }

    /**
     * Destroy/delete an safe.
     *
     * @param  \App\Safe $safe
     * @return JSON
     */
    public function destroy(Safe $safe)
    {
        return $this->content->destroy($safe);
    }

    /**
     * Search safes with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return new SafeCollection($this->content->search($request));
    }
}
