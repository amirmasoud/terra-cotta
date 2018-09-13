<?php

namespace App\Services;

use App\Helpers\Content;
use App\Contracts\Content as ContentInterface;

class Crud extends Content implements ContentInterface
{
    /**
     * Resource's model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $model;

    /**
     * Helper class instance.
     *
     * @var \App\Helpers\Content
     */
    public $helper;

    /**
     * Create a new Crud instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->helper = new Content();
    }

    /**
     * Show all resource records with applied filters on data.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index($request = null)
    {
        if ($request) {
            $query = $this->model;
            $query = $this->helper->filter($query, $request);
            $query = $this->helper->sort($query, $request);

            return $query->paginate($this->helper->perPage($request));
        } else {
            return $this->model->paginate(config('content.default.per_page'));
        }
    }

    /**
     * Return requirement for creating new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        return $this->model->create($request->all());
    }

    /**
     * Show a resource.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        if (!is_integer($model)) {
            return $model;
        } else {
            return $this->model->find($model);
        }
    }

    /**
     * Show resource to be editted.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {
        return $this->show($model);
    }

    /**
     * Update given resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function update($request, $model)
    {
        return $this->edit($model)->update($request->all())
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Delete a resource.
     *
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Http\Response
     */
    public function destroy($model)
    {
        return $this->show($model)->delete()
            ? response(null, 204)
            : response(null, 500);
    }

    /**
     * Search through resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search($request)
    {
        $query = $this->model;
        foreach (config('content.search.columns') as $col) {
            $query->where($col, config('content.search.clause'), "%{$request->q}%");
        }

        return $query->paginate($this->helper->perPage($request));
    }
}
