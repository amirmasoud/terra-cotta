<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Content
{
    /**
     * Get content config.
     *
     * @param  string $name
     * @return string|array
     */
    protected function config(string $name, string $model = null)
    {
        if ($model) {
            return config('content.model.' . $model . '.' . $name);
        } else {
            return config('content.' . $name);
        }
    }

    /**
     * Filter through resource data.
     *
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function filter($query, $request): Builder
    {
        // Global filters
        foreach ($this->config('map.filter') as $param => $attr) {
            $this->applyFilter($query, $request, $param, $attr);
        }

        // Model specefic filters
        foreach ($this->config('model') as $model => $config) {
            if ($query->getModel() instanceof $model) {

                foreach ($this->config('map.filter', $model) as $param => $attr) {
                    $this->applyFilter($query, $request, $param, $attr);
                }
            }
        }

        return $query;
    }

    /**
     * Get per page value for resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return integer
     */
    protected function perPage(Request $request): int
    {
        if ($paginate = $request->query($this->config('map.paginate'))) {
            if ($paginate > 0) {
                return $paginate;
            } else {
                return 9999;
            }
        } else {
            return $this->config('default.per_page');
        }
    }

    /**
     * Apply relationship filter on model relationships.
     *
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  \Illuminate\Http\Request $request
     * @param  string $param
     * @param  array $attr
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    private function relationshipFilter(&$query, $request, $param, $attr)
    {
        $query->whereHas($attr['relationship'], function($q) use ($param, $attr, $request) {
            $q->where($attr['column'], $request->query($param));
        });
    }

    /**
     * Apply simple filter on model columns.
     *
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  \Illuminate\Http\Request $request
     * @param  string $param
     * @param  array $attr
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function simpleFilter(&$query, $request, $param, $attr): Builder
    {
        $query->when($request->query($param), function($query) use ($param, $attr, $request) {
            $query->where($attr['column'], $request->query($param));
        });
    }

    /**
     * Apply filters to columns and relationships.
     *
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  \Illuminate\Http\Request $request
     * @param  string $param
     * @param  array $attr
     * @return \Illuminate\Database\Eloquent\Model|void
     */
    private function applyFilter(&$query, $request, $param, $attr)
    {
        $query->when($request->query($param), function($query) use ($param, $attr, $request) {
            if (array_key_exists('relationship', $attr)) {
                $this->relationshipFilter($query, $request, $param, $attr);
            } else {
                $this->simpleFilter($query, $request, $param, $attr);
            }
        });
    }

    /**
     * Sort resource data.
     *
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function sort($query, $request): Builder
    {
        foreach (config('content.map.order') as $sort) {
            $query->when($request->query($sort), function($query) use ($sort, $request) {
                $sort = explode('|', $request->query($sort));
                $query->orderBy($sort[0], $sort[1]);
            });
        }

        return $query;
    }
}
