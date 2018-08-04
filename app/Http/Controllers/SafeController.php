<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Type;
use App\Safe;
use App\Field;
use App\Group;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Safe\IndexRequest;
use App\Http\Requests\Safe\CreateRequest;
use App\Http\Requests\Safe\UpdateRequest;
use App\Http\Requests\Safe\SearchRequest;

class SafeController extends Controller
{
    /**
     * Show paginated safes.
     *
     * @return JSON
     */
    public function index(IndexRequest $request)
    {
        return Safe::when($request->category, function ($query) use ($request) {
                    return Safe::whereHas('categories', function ($q) use ($request) {
                        $q->where('category_id', $request->category);
                    });
                }, function ($query) {
                    return $query;
                })->paginate();
    }

    /**
     * Create new safe.
     *
     * @param  \App\Http\Requests\Safe\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        $safe = Safe::create($request->all());

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
                        $field->type_id = $f['type'] ?? Type::default()->id;
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
        return $safe;
    }

    /**
     * Show single safe for edit.
     *
     * @param  \App\Safe $safe
     * @return JSON
     */
    public function edit(Safe $safe)
    {
        return Safe::whereId($safe->id)
            ->with(['groups:id,name,icon_id,safe_id',
                    'groups.fields:id,label,value,type_id,group_id',
                    'categories:id,name,icon_id',
                    'tags:id,name,color'])
            ->get()[0]; // @TODO: Add API resource
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
                        $field->type_id = $f['type'] ?? Type::default()->id;
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
        return $safe->delete()
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Search safes with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return Safe::Where('name', 'LIKE', "%{$request->q}%")->paginate();
    }
}
