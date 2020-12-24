<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use App\Contracts\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\SearchRequest;
use App\Http\Requests\User\UpdateRequest;

use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
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
        $this->authorizeResource(User::class);
        $this->content = $content;
        $this->content->model = User::with('roles');
    }

    /**
     * Show paginated categories.
     *
     * @return \App\Http\ResourcesUserCollection
     */
    public function index(IndexRequest $request)
    {
        $this->authorize('browse', User::class);
        return new UserCollection($this->content->index($request));
    }

    /**
     * Create new User.
     *
     * @param  \App\Http\Requests\Settings\User\CreateRequest $request
     * @return \App\Http\Resources\User
     */
    public function store(CreateRequest $request)
    {
        $request->merge([
            'password' => $request->filled('password')
                            ? bcrypt($request->password)
                            : $user->password
        ]);
        $user = $this->content->store($request);
        $user->syncRoles($request->roles);
        return new UserResource($user);
    }

    /**
     * Show an User.
     *
     * @param  \App\Models\User $user
     * @return \App\Http\Resources\User
     */
    public function show(User $user)
    {
        return new UserResource($this->content->show($user)->load('roles'));
    }

    /**
     * Show single User for edit.
     *
     * @param  \App\Models\User $user
     * @return \App\Http\Resources\User
     */
    public function edit(User $user)
    {
        return new UserResource($this->content->edit($user)->load('roles'));
    }

    /**
     * Update an User.
     *
     * @param  \App\Http\Requests\Settings\User\UpdateRequest $request
     * @param  \App\Models\User $user
     * @return Boolean
     */
    public function update(UpdateRequest $request, User $user)
    {
        $request->merge([
            'password' => $request->filled('password')
                            ? bcrypt($request->password)
                            : $user->password
        ]);
        $user->syncRoles($request->roles);
        return $this->content->update($request, $user);
    }

    /**
     * Destroy/delete an User.
     *
     * @param  \App\Models\User $user
     * @return Boolean
     */
    public function destroy(User $user)
    {
        return $this->content->destroy($user);
    }

    /**
     * Search categories with name.
     *
     * @param  Request $request
     * @return \App\Http\ResourcesUserCollection
     */
    public function search(SearchRequest $request)
    {
        $this->authorize('browse', User::class);
        return new UserCollection($this->content->search($request));
    }
}
