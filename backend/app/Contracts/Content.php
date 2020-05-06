<?php

namespace App\Contracts;

interface Content
{
    /**
     * Show paginated resource with optional filter.
     *
     * @param  \Illuminate\Http\Request|null $request
     * @return \Illuminate\Http\Response
     */
    public function index($request = null);

    /**
     * Show requirements for creating new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create();

    /**
     * Store a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($request);

    /**
     * Show a model.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function show($model);

    /**
     * Show a resource for edit.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function edit($model);

    /**
     * Update a resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function update($request, $model);

    /**
     * Delete a resource.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function destroy($model);

    /**
     * Search trough resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search($request);
}
