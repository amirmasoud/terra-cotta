<?php

namespace App\Http\Controllers\Settings;

use App\Models\Category;
use App\Contracts\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Category\IndexRequest;
use App\Http\Requests\Settings\Category\CreateRequest;
use App\Http\Requests\Settings\Category\UpdateRequest;
use App\Http\Requests\Settings\Category\SearchRequest;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\Category as CategoryResource;

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
        $this->authorizeResource(Category::class);
        $this->content = $content;
        $this->content->model = Category::with('icon');
    }

    /**
     * Show paginated categories.
     *
     * @return \App\Http\ResourcesCategoryCollection
     */
    public function index(IndexRequest $request)
    {
        $this->authorize('browse', Category::class);
        return new CategoryCollection($this->content->index($request));
    }

    /**
     * Create new category.
     *
     * @param  \App\Http\Requests\Settings\Category\CreateRequest $request
     * @return \App\Http\Resources\Category
     */
    public function store(CreateRequest $request)
    {
        return new CategoryResource($this->content->store($request));
    }

    /**
     * Show an category.
     *
     * @param  \App\Models\Category $category
     * @return \App\Http\Resources\Category
     */
    public function show(Category $category)
    {
        return new CategoryResource($this->content->show($category)->load('icon'));
    }

    /**
     * Show single category for edit.
     *
     * @param  \App\Models\Category $category
     * @return \App\Http\Resources\Category
     */
    public function edit(Category $category)
    {
        return new CategoryResource($this->content->edit($category)->load('icon'));
    }

    /**
     * Update an category.
     *
     * @param  \App\Http\Requests\Settings\Category\UpdateRequest $request
     * @param  \App\Models\Category $category
     * @return Boolean
     */
    public function update(UpdateRequest $request, Category $category)
    {
        return $this->content->update($request, $category);
    }

    /**
     * Destroy/delete an category.
     *
     * @param  \App\Models\Category $category
     * @return Boolean
     */
    public function destroy(Category $category)
    {
        return $this->content->destroy($category);
    }

    /**
     * Search categories with name.
     *
     * @param  Request $request
     * @return \App\Http\ResourcesCategoryCollection
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', Category::class);
        return new CategoryCollection($this->content->search($request));
    }
}
