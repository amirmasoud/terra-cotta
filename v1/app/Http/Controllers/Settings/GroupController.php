<?php

namespace App\Http\Controllers\Settings;

use App\Group;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Group\CreateRequest;
use App\Http\Requests\Settings\Group\UpdateRequest;
use App\Http\Requests\Settings\Group\SearchRequest;

use App\Http\Resources\GroupCollection;
use App\Http\Resources\Group as GroupResource;

class GroupController extends Controller
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
        $this->authorizeResource(Group::class);
        $this->content = $content;
        $this->content->model = Group::with('icon', 'safe', 'fields');
    }

    /**
     * Show paginated groups.
     *
     * @return JSON
     */
    public function index()
    {
        $this->authorize('browse', Group::class);
        return new GroupCollection($this->content->index());
    }

    /**
     * Create new group.
     *
     * @param  \App\Http\Requests\Settings\Group\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return new GroupResource($this->content->store($request));
    }

    /**
     * Show an group.
     *
     * @param  \App\Group $group
     * @return JSON
     */
    public function show(Group $group)
    {
        return new GroupResource($this->content->show($group)->load('icon', 'safe'));
    }

    /**
     * Show single group for edit.
     *
     * @param  \App\Group $group
     * @return JSON
     */
    public function edit(Group $group)
    {
        return new GroupResource($this->content->edit($group)->load('icon', 'safe'));
    }

    /**
     * Update an group.
     *
     * @param  \App\Http\Requests\Settings\Group\UpdateRequest $request
     * @param  \App\Group $group
     * @return JSON
     */
    public function update(UpdateRequest $request, Group $group)
    {
        return $this->content->update($request, $group);
    }

    /**
     * Destroy/delete an group.
     *
     * @param  \App\Group $group
     * @return JSON
     */
    public function destroy(Group $group)
    {
        return $this->content->destroy($group);
    }

    /**
     * Search groups with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', Group::class);
        return new GroupCollection($this->content->search($request));
    }
}
