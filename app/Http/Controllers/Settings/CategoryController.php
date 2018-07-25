<?php

namespace App\Http\Controllers\Settings;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Category\CreateRequest;
use App\Http\Requests\Settings\Category\UpdateRequest;
use App\Http\Requests\Settings\Category\SearchRequest;

class CategoryController extends Controller
{
    /**
     * Show paginated categories.
     *
     * @return JSON
     */
    public function index()
    {
        return Category::paginate();
    }

    /**
     * Create new category.
     *
     * @param  \App\Http\Requests\Settings\Category\CreateRequest $request
     * @return JSON
     */
    public function store(CreateRequest $request)
    {
        return Category::create($request->all());
    }

    /**
     * Show an category.
     *
     * @param  \App\Category $category
     * @return JSON
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show single category for edit.
     *
     * @param  \App\Category $category
     * @return JSON
     */
    public function edit(Category $category)
    {
        return $category;
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
        return $category->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Destroy/delete an category.
     *
     * @param  \App\Category $category
     * @return JSON
     */
    public function destroy(Category $category)
    {
        return $category->delete()
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Search categories with name.
     *
     * @param  Request $request
     * @return JSON
     */
    public function search(SearchRequest $request)
    {
        return Category::Where('name', 'LIKE', "%{$request->q}%")->paginate();
    }
}
