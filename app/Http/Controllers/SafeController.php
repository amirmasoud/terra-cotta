<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Type;
use App\Safe;
use App\Field;
use App\Category;
use App\Contracts\Content;
use App\Http\Requests\Safe\IndexRequest;
use App\Http\Requests\Safe\CreateRequest;
use App\Http\Requests\Safe\UpdateRequest;
use App\Http\Requests\Safe\SearchRequest;
use Facades\App\Repositories\SafeRepository;

use App\Http\Resources\SafeCollection;
use App\Http\Resources\Safe as SafeResource;

class SafeController extends Controller
{
    private $content;

    private $load = ['categories', 'tags', 'groups', 'groups.fields', 'groups.fields.type', 'categories.icon'];

    /**
     * Constructor of the class.
     *
     * @param \App\Contracts\Content $content
     */
    public function __construct(Content $content)
    {
        $this->authorizeResource(Safe::class);
        $this->content = $content;
        $this->content->model = Safe::with($this->load);
    }

    /**
     * Show paginated safes.
     *
     * @param  \App\Http\Requests\Safe\IndexRequest $request
     * @return \App\Http\Resources\SafeCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(IndexRequest $request)
    {
        $this->authorize('browse', Safe::class);
        return new SafeCollection($this->content->index($request));
    }

    /**
     * Create new safe.
     *
     * @param  \App\Http\Requests\Safe\CreateRequest $request
     * @return \App\Http\Resources\Safe
     */
    public function store(CreateRequest $request)
    {
        $safe = $this->content->store($request);

        // Attach categories
        SafeRepository::attachCategories($request, $safe);

        // Attach tags
        SafeRepository::attachTags($request, $safe);

        // Create and save groups and fields
        SafeRepository::attachGroupsAndFields($request, $safe);

        return new SafeResource($this->content->show($safe)->load($this->load));
    }

    /**
     * Show an safe.
     *
     * @param  \App\Safe $safe
     * @return \App\Http\Resources\Safe
     */
    public function show(Safe $safe)
    {
        return new SafeResource($this->content->show($safe)->load($this->load));
    }

    /**
     * Show single safe for edit.
     *
     * @param  \App\Safe $safe
     * @return \App\Http\Resources\Safe
     */
    public function edit(Safe $safe)
    {
        return new SafeResource($this->content->show($safe)->load($this->load));
    }

    /**
     * Update an safe.
     *
     * @param  \App\Http\Requests\Safe\UpdateRequest $request
     * @param  \App\Safe $safe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Safe $safe)
    {
        $safe->update($request->all());

        // Sync categories
        SafeRepository::syncCategories($request, $safe);

        // Attach tags
        SafeRepository::syncTags($request, $safe);

        // Sync groups and fields
        SafeRepository::syncGroupsAndFields($request, $safe);

        return response(null, 204);
    }

    /**
     * Destroy/delete an safe.
     *
     * @param  \App\Safe $safe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Safe $safe)
    {
        return $this->content->destroy($safe);
    }

    /**
     * Search safes with name.
     *
     * @param  SearchRequest $request
     * @return SafeCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', Safe::class);
        return new SafeCollection($this->content->search($request));
    }
}
