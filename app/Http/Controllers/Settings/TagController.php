<?php

namespace App\Http\Controllers\Settings;

use App\Tag;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Tag\CreateRequest;
use App\Http\Requests\Settings\Tag\UpdateRequest;
use App\Http\Requests\Settings\Tag\SearchRequest;

class TagController extends Controller
{
    /**
     * Content Service Provider
     *
     * @var \App\Contracts\Content
     */
    private $content;

    /**
     * Constructor of the class.
     *
     * @param \App\Contracts\Content $content
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
        $this->content->model = Tag::class;
    }

    /**
     * Show paginated tags.
     *
     * @return JSON
     */
    public function index()
    {
        return $this->content->index();
    }

    /**
     * Create new tag.
     *
     * @param  \App\Http\Requests\Settings\Tag\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return $this->content->store($request);
    }

    /**
     * Show an tag.
     *
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function show(Tag $tag)
    {
        return $this->content->show($tag);
    }

    /**
     * Show single tag for edit.
     *
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function edit(Tag $tag)
    {
        return $this->content->edit($tag);
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
        return $this->content->update($request, $tag);
    }

    /**
     * Destroy/delete an tag.
     *
     * @param  \App\Tag $tag
     * @return JSON
     */
    public function destroy(Tag $tag)
    {
        return $this->content->destroy($tag);
    }

    /**
     * Search tags with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return $this->content->search($request);
    }
}
