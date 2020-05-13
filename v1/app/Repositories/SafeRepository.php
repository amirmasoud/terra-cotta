<?php

namespace App\Repositories;

use App\Tag;
use App\Type;
use App\Safe;
use App\Field;
use App\Category;
use Illuminate\Http\Request;

class SafeRepository
{
    /**
     * Attach categories.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Safe $safe
     * @return \App\Safe
     */
    public function attachCategories(Request $request, Safe $safe): Safe
    {
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

        return $safe;
    }

    /**
     * Attach tags.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Safe $safe
     * @return \App\Safe
     */
    public function attachTags(Request $request, Safe $safe): Safe
    {
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

        return $safe;
    }

    /**
     * Attach groups.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Safe $safe
     * @return \App\Safe
     */
    public function attachGroupsAndFields(Request $request, Safe $safe): Safe
    {
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

        return $safe;
    }

    /**
     * Sync categories.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Safe $safe
     * @return \App\Safe
     */
    public function syncCategories(Request $request, Safe $safe): Safe
    {
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

        return $safe;
    }

    /**
     * Sync tags.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Safe $safe
     * @return \App\Safe
     */
    public function syncTags(Request $request, Safe $safe): Safe
    {
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

        return $safe;
    }

    /**
     * Sync groups and fields.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Safe $safe
     * @return \App\Safe
     */
    public function syncGroupsAndFields(Request $request, Safe $safe): Safe
    {
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

        return $safe;
    }
}
