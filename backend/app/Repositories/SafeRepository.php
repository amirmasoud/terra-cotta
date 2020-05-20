<?php

namespace App\Repositories;

use App\Tag;
use App\Type;
use App\Key;
use App\Field;
use App\Category;
use Illuminate\Http\Request;

class KeyRepository
{
    /**
     * Attach categories.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Key $key
     * @return \App\Key
     */
    public function attachCategories(Request $request, Key $key): Key
    {
        if ($request->categories) {
            foreach ($request->categories as $categoryName) {
                if (Category::whereName($categoryName)->exists()) {
                    $category = Category::whereName($categoryName)
                        ->first();
                } else {
                    $category = Category::create(['name' => $categoryName]);
                }
                $key->categories()->attach($category->id);
            }
        }

        return $key;
    }

    /**
     * Attach tags.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Key $key
     * @return \App\Key
     */
    public function attachTags(Request $request, Key $key): Key
    {
        if ($request->tags) {
            foreach ($request->tags as $tagName) {
                if (Tag::whereName($tagName)->exists()) {
                    $tag = Tag::whereName($tagName)
                        ->first();
                } else {
                    $tag = Tag::create(['name' => $tagName, 'color' => '#ffffff']);
                }
                $key->tags()->attach($tag->id);
            }
        }

        return $key;
    }

    /**
     * Attach groups.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Key $key
     * @return \App\Key
     */
    public function attachGroupsAndFields(Request $request, Key $key): Key
    {
        // Create and save groups and fields
        if ($request->groups) {
            foreach ($request->groups as $g) {
                $group = $key->groups()->create($g);
                if (array_key_exists('fields', $g)) {
                    foreach ($g['fields'] as $f) {
                        $field = new Field($f);
                        $field->type_id = $f['type']['id'] ?? Type::
                            default()->id;
                        $field->group_id = $group->id;
                        $key->fields()->save($field);
                    }
                }
            }
        }

        return $key;
    }

    /**
     * Sync categories.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Key $key
     * @return \App\Key
     */
    public function syncCategories(Request $request, Key $key): Key
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
            $key->categories()->sync($categories);
        }

        return $key;
    }

    /**
     * Sync tags.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Key $key
     * @return \App\Key
     */
    public function syncTags(Request $request, Key $key): Key
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
            $key->tags()->sync($tags);
        }

        return $key;
    }

    /**
     * Sync groups and fields.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Key $key
     * @return \App\Key
     */
    public function syncGroupsAndFields(Request $request, Key $key): Key
    {
        $key->groups()->delete();
        $key->fields()->delete();
        if ($request->groups) {
            foreach ($request->groups as $g) {
                $group = $key->groups()->create($g);
                if (array_key_exists('fields', $g)) {
                    foreach ($g['fields'] as $f) {
                        $field = new Field($f);
                        $field->type_id = $f['type']['id'] ?? Type::
                            default()->id;
                        $field->group_id = $group->id;
                        $key->fields()->save($field);
                    }
                }
            }
        }

        return $key;
    }
}
