<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Type;
use App\Safe;
use App\Field;
use App\Group;
use App\Category;
use App\Http\Controllers\Controller;
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
    public function index()
    {
        return Safe::paginate();
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
            foreach ($request->categories as $categoryId) {
                $safe->categories()->attach($categoryId);
            }
        }

        // Attach tags
        if ($request->tags) {
            foreach ($request->tags as $tagId) {
                $safe->tags()->attach($tagId);
            }
        }

        // Create and save groups and fields
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
        return $safe;
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
        return $safe->update($request->all())
            ? response(null, 204)
            : response(null, 500);
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
