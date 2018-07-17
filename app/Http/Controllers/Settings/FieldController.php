<?php

namespace App\Http\Controllers\Settings;

use App\Field;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Field\CreateRequest;
use App\Http\Requests\Settings\Field\UpdateRequest;

class FieldController extends Controller
{
    /**
     * Show paginated fields.
     *
     * @return JSON
     */
    public function index()
    {
        return Field::paginate();
    }

    /**
     * Create new field.
     *
     * @param  \App\Http\Requests\Settings\Field\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return Field::create($request->all());
    }

    /**
     * Show an field.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function show(Field $field)
    {
        return $field;
    }

    /**
     * Show single field for edit.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function edit(Field $field)
    {
        return $field;
    }

    /**
     * Update an field.
     *
     * @param  \App\Http\Requests\Settings\Field\UpdateRequest $request
     * @param  \App\Field $field
     * @return JSON
     */
    public function update(UpdateRequest $request, Field $field)
    {
        return $field->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Destroy/delete an field.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function destroy(Field $field)
    {
        return $field->delete()
            ? response(null, 204)
            : response(null, 500);
    }
}
