<?php

namespace App\Http\Controllers;

use App\Safe;
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
        return Safe::create($request->all());
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
