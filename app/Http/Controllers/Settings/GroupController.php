<?php

namespace App\Http\Controllers\Settings;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Group\CreateRequest;
use App\Http\Requests\Settings\Group\UpdateRequest;
use App\Http\Requests\Settings\Group\SearchRequest;

class GroupController extends Controller
{
    /**
     * Show paginated groups.
     *
     * @return JSON
     */
    public function index()
    {
        return Group::paginate();
    }

    /**
     * Create new group.
     *
     * @param  \App\Http\Requests\Settings\Group\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return Group::create($request->all());
    }

    /**
     * Show an group.
     *
     * @param  \App\Group $group
     * @return JSON
     */
    public function show(Group $group)
    {
        return $group;
    }

    /**
     * Show single group for edit.
     *
     * @param  \App\Group $group
     * @return JSON
     */
    public function edit(Group $group)
    {
        return $group;
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
        return $group->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Destroy/delete an group.
     *
     * @param  \App\Group $group
     * @return JSON
     */
    public function destroy(Group $group)
    {
        return $group->delete()
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Search groups with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return Group::Where('name', 'LIKE', "%{$request->q}%")->paginate();
    }
}
