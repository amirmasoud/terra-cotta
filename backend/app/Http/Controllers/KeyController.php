<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Type;
use App\Key;
use App\Field;
use App\Category;
use App\Contracts\Content;
use App\Http\Requests\Key\IndexRequest;
use App\Http\Requests\Key\CreateRequest;
use App\Http\Requests\Key\UpdateRequest;
use App\Http\Requests\Key\SearchRequest;
use Facades\App\Repositories\KeyRepository;

use App\Http\Resources\KeyCollection;
use App\Http\Resources\Key as KeyResource;

class KeyController extends Controller
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
        $this->authorizeResource(Key::class);
        $this->content = $content;
        $this->content->model = Key::with($this->load);
    }

    /**
     * Show paginated keys.
     *
     * @param  \App\Http\Requests\Key\IndexRequest $request
     * @return \App\Http\Resources\KeyCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(IndexRequest $request)
    {
        $this->authorize('browse', Key::class);
        return new KeyCollection($this->content->index($request));
    }

    /**
     * Create new key.
     *
     * @param  \App\Http\Requests\Key\CreateRequest $request
     * @return \App\Http\Resources\Key
     */
    public function store(CreateRequest $request)
    {
        $key = $this->content->store($request);

        // Attach categories
        KeyRepository::attachCategories($request, $key);

        // Attach tags
        KeyRepository::attachTags($request, $key);

        // Create and save groups and fields
        KeyRepository::attachGroupsAndFields($request, $key);

        return new KeyResource($this->content->show($key)->load($this->load));
    }

    /**
     * Show an key.
     *
     * @param  \App\Key $key
     * @return \App\Http\Resources\Key
     */
    public function show(Key $key)
    {
        return new KeyResource($this->content->show($key)->load($this->load));
    }

    /**
     * Show single key for edit.
     *
     * @param  \App\Key $key
     * @return \App\Http\Resources\Key
     */
    public function edit(Key $key)
    {
        return new KeyResource($this->content->show($key)->load($this->load));
    }

    /**
     * Update an key.
     *
     * @param  \App\Http\Requests\Keys\UpdateRequest $request
     * @param  \App\Key $key
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Key $key)
    {
        $key->update($request->all());

        // Sync categories
        KeyRepository::syncCategories($request, $key);

        // Attach tags
        KeyRepository::syncTags($request, $key);

        // Sync groups and fields
        KeyRepository::syncGroupsAndFields($request, $key);

        return response(null, 204);
    }

    /**
     * Destroy/delete an key.
     *
     * @param  \App\Key $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        return $this->content->destroy($key);
    }

    /**
     * Search keys with name.
     *
     * @param  SearchRequest $request
     * @return KeyCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', Key::class);
        return new KeyCollection($this->content->search($request));
    }
}
