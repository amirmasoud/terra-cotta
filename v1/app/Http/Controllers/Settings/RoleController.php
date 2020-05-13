<?php

namespace App\Http\Controllers\Settings;

use App\Role;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Role\IndexRequest;
use App\Http\Requests\Settings\Role\CreateRequest;
use App\Http\Requests\Settings\Role\UpdateRequest;
use App\Http\Requests\Settings\Role\SearchRequest;

use App\Http\Resources\RoleCollection;
use App\Http\Resources\Role as RoleResource;

class RoleController extends Controller
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
        $this->authorizeResource(Role::class);
        $this->content = $content;
        $this->content->model = Role::query();
    }

    /**
     * Show paginated categories.
     *
     * @return \App\Http\ResourcesRoleCollection
     */
    public function index(IndexRequest $request)
    {
        $this->authorize('browse', Role::class);
        return new RoleCollection($this->content->index($request));
    }

    /**
     * Create new role.
     *
     * @param  \App\Http\Requests\Settings\Role\CreateRequest $request
     * @return \App\Http\Resources\Role
     */
    public function store(CreateRequest $request)
    {
        $role = $this->content->store($request);
        $role->syncPermissions($request->permissions);
        return new RoleResource($role);
    }

    /**
     * Show an role.
     *
     * @param  \App\Role $role
     * @return \App\Http\Resources\Role
     */
    public function show(Role $role)
    {
        return new RoleResource($this->content->show($role));
    }

    /**
     * Show single role for edit.
     *
     * @param  \App\Role $role
     * @return \App\Http\Resources\Role
     */
    public function edit(Role $role)
    {
        return new RoleResource($this->content->edit($role)->load('permissions'));
    }

    /**
     * Update an role.
     *
     * @param  \App\Http\Requests\Settings\Role\UpdateRequest $request
     * @param  \App\Role $role
     * @return Boolean
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return $this->content->update($request, $role);
    }

    /**
     * Destroy/delete an role.
     *
     * @param  \App\Role $role
     * @return Boolean
     */
    public function destroy(Role $role)
    {
        return $this->content->destroy($role);
    }

    /**
     * Search categories with name.
     *
     * @param  Request $request
     * @return \App\Http\ResourcesRoleCollection
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', Role::class);
        return new RoleCollection($this->content->search($request));
    }
}
