<?php

namespace App\Http\Controllers\Settings;

use App\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Type\CreateRequest;
use App\Http\Requests\Settings\Type\UpdateRequest;

class TypeController extends Controller
{
    /**
     * Show paginated types.
     *
     * @return JSON
     */
    public function index()
    {
        return Type::paginate();
    }

    /**
     * Create new type.
     *
     * @param  \App\Http\Requests\Settings\Type\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return Type::create($request->all());
    }

    /**
     * Show an type.
     *
     * @param  \App\Type $type
     * @return JSON
     */
    public function show(Type $type)
    {
        return $type;
    }

    /**
     * Show single type for edit.
     *
     * @param  \App\Type $type
     * @return JSON
     */
    public function edit(Type $type)
    {
        return $type;
    }

    /**
     * Update an type.
     *
     * @param  \App\Http\Requests\Settings\Type\UpdateRequest $request
     * @param  \App\Type $type
     * @return JSON
     */
    public function update(UpdateRequest $request, Type $type)
    {
        return $type->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Destroy/delete an type.
     *
     * @param  \App\Type $type
     * @return JSON
     */
    public function destroy(Type $type)
    {
        return $type->delete()
            ? response(null, 204)
            : response(null, 500);
    }
}
