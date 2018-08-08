<?php

namespace App\Http\Controllers\Settings;

use App\Category;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Category\CreateRequest;
use App\Http\Requests\Settings\Category\UpdateRequest;
use App\Http\Requests\Settings\Category\SearchRequest;

class CategoryController extends Controller
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
        $this->content->model = Category::class;
    }

    /**
     * Show paginated categories.
     *
     * @return JSON
     */
    public function index()
    {
        return $this->content->index();
    }

    /**
     * Create new category.
     *
     * @param  \App\Http\Requests\Settings\Category\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return $this->content->store($request);
    }

    /**
     * Show an category.
     *
     * @param  \App\Category $category
     * @return JSON
     */
    public function show(Category $category)
    {
        return $this->content->show($category);
    }

    /**
     * Show single category for edit.
     *
     * @param  \App\Category $category
     * @return JSON
     */
    public function edit(Category $category)
    {
        return $this->content->edit($category);
    }

    /**
     * Update an category.
     *
     * @param  \App\Http\Requests\Settings\Category\UpdateRequest $request
     * @param  \App\Category $category
     * @return JSON
     */
    public function update(UpdateRequest $request, Category $category)
    {
        return $this->content->update($request, $category);
    }

    /**
     * Destroy/delete an category.
     *
     * @param  \App\Category $category
     * @return JSON
     */
    public function destroy(Category $category)
    {
        return $this->content->destroy($category);
    }

    /**
     * Search categories with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return $this->content->search($request);
    }

    /**
     * Get all unpaginated categories.
     *
     * @deprecated 1.1.0 - to be deprecated and use index method instead
     * @version 1.0.0
     * @return JSON
     */
    public function all()
    {
        return Category::with('icon')->get();
    }
}
