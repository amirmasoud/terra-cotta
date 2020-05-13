<?php

namespace App\Http\Controllers\Settings;

use App\Icon;
use App\Contracts\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Icon\SearchRequest;
use App\Http\Requests\Settings\Icon\CreateRequest;
use App\Http\Requests\Settings\Icon\UpdateRequest;

use App\Http\Resources\IconCollection;
use App\Http\Resources\Icon as IconResource;

class IconController extends Controller
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
        $this->authorizeResource(Icon::class);
        $this->content = $content;
        $this->content->model = Icon::with('categories', 'groups', 'fields');
    }

    /**
     * Show paginated icons.
     *
     * @return JSON
     */
    public function index()
    {
        $this->authorize('browse', Icon::class);
        return new IconCollection($this->content->index());
    }

    /**
     * Create new icon.
     *
     * @param  \App\Http\Requests\Settings\Icon\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return new IconResource($this->content->store($request));
    }

    /**
     * Show an icon.
     *
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function show(Icon $icon)
    {
        return new IconResource($this->content->show($icon));
    }

    /**
     * Show single icon for edit.
     *
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function edit(Icon $icon)
    {
        return new IconResource($this->content->edit($icon));
    }

    /**
     * Update an icon.
     *
     * @param  \App\Http\Requests\Settings\Icon\UpdateRequest $request
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function update(UpdateRequest $request, Icon $icon)
    {
        return $this->content->update($request, $icon);
    }

    /**
     * Destroy/delete an icon.
     *
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function destroy(Icon $icon)
    {
        return $this->content->destroy($icon);
    }

    /**
     * Search icons with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', Icon::class);
        return new IconCollection($this->content->search($request));
    }
}
