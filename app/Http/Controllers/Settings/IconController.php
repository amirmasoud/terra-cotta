<?php

namespace App\Http\Controllers\Settings;

use App\Icon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Icon\SearchRequest;
use App\Http\Requests\Settings\Icon\CreateRequest;
use App\Http\Requests\Settings\Icon\UpdateRequest;

class IconController extends Controller
{
    /**
     * Show paginated icons.
     *
     * @return JSON
     */
    public function index()
    {
        return Icon::paginate();
    }

    /**
     * Create new icon.
     *
     * @param  \App\Http\Requests\Settings\Icon\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return Icon::create($request->all());
    }

    /**
     * Show an icon.
     *
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function show(Icon $icon)
    {
        return $icon;
    }

    /**
     * Show single icon for edit.
     *
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function edit(Icon $icon)
    {
        return $icon;
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
        return $icon->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Destroy/delete an icon.
     *
     * @param  \App\Icon $icon
     * @return JSON
     */
    public function destroy(Icon $icon)
    {
        return $icon->delete()
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Search icons with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return Icon::Where('name', 'LIKE', "%{$request->q}%")->paginate();
    }
}
