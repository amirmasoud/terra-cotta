<?php

namespace App\Http\Controllers\Settings;

use App\Field;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Field\CreateRequest;
use App\Http\Requests\Settings\Field\UpdateRequest;

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
        $this->content = $content;
        $this->content->model = Field::class;
    }

    /**
     * Show paginated fields.
     *
     * @return JSON
     */
    public function index()
    {
        return $this->content->index();
    }

    /**
     * Create new field.
     *
     * @param  \App\Http\Requests\Settings\Field\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return $this->content->store($request);
    }

    /**
     * Show an field.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function show(Field $field)
    {
        return $this->content->show($field);
    }

    /**
     * Show single field for edit.
     *
     * @param  \App\Field $field
     * @return JSON
     */
    public function edit(Field $field)
    {
        return $this->content->edit($field);
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
        return $this->content->destroy($field);
    }
}
