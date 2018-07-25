<?php

namespace App\Http\Controllers\Settings;

use App\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Tag\CreateRequest;
use App\Http\Requests\Settings\Tag\UpdateRequest;
use App\Http\Requests\Settings\Tag\SearchRequest;

class TagController extends Controller
{
    /**
     * Show paginated tags.
     *
     * @return JSON
     */
    public function index()
    {
        return Tag::paginate();
    }

    /**
     * Create new tag.
     *
     * @param  \App\Http\Requests\Settings\Tag\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return Tag::create($request->all());
    }

    /**
     * Show an tag.
     *
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Show single tag for edit.
     *
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function edit(Tag $tag)
    {
        return $tag;
    }

    /**
     * Update an tag.
     *
     * @param  \App\Http\Requests\Settings\Tag\UpdateRequest $request
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function update(UpdateRequest $request, Tag $tag)
    {
        return $tag->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Destroy/delete an tag.
     *
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function destroy(Tag $tag)
    {
        return $tag->delete()
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Search categories with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return Tag::Where('name', 'LIKE', "%{$request->q}%")->paginate();
    }
}
