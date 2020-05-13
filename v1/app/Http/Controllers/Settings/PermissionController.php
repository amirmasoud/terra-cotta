<?php

namespace App\Http\Controllers\Settings;

use App\Contracts\Content;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Settings\Permission\IndexRequest;

use App\Http\Resources\PermissionCollection;
use App\Http\Resources\Permission as PermissionResource;

class PermissionController extends Controller
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
        $this->content->model = Permission::query();
    }

    /**
     * Show paginated categories.
     *
     * @return \App\Http\ResourcesPermissionCollection
     */
    public function index(IndexRequest $request)
    {
        $this->authorize('browse', Permission::class);
        return new PermissionCollection($this->content->index($request));
    }
}
