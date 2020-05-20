<?php

namespace App\Http\Controllers\Settings;

use App\Field;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Field\CreateRequest;
use App\Http\Requests\Settings\Field\UpdateRequest;

use App\Http\Resources\FieldCollection;
use App\Http\Resources\Field as FieldResource;

class FieldController extends Controller
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
        $this->authorizeResource(Field::class);
        $this->content = $content;
        $this->content->model = Field::with('type', 'group', 'key', 'icon');
    }

    /**
     * Show paginated fields.
     *
     * @return JSON
     */
    public function index()
    {
        $this->authorize('browse', Field::class);
        return new FieldCollection($this->content->index());
    }

    /**
     * Create new field.
     *
     * @param  \App\Http\Requests\Settings\Field\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return new FieldResource($this->content->store($request));
    }

    /**
     * Show an field.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function show(Field $field)
    {
        return new FieldResource($this->content->show($field->load('icon', 'group', 'key', 'type')));
    }

    /**
     * Show single field for edit.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function edit(Field $field)
    {
        return new FieldResource($this->content->edit($field->load('icon', 'group', 'key', 'type')));
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
        return $this->content->update($request, $field);
    }

    /**
     * Destroy/delete an field.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function destroy(Field $field)
    {
        $this->authorize('browse', Field::class);
        return $this->content->destroy($field);
    }
}
