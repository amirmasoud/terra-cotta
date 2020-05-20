<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Items that should be on the menu
     *
     * @return void
     */
    public function __invoke()
    {
        $items = [];
        foreach (array_diff(scandir('../App/Admin'), ['.', '..']) as $item) {
            $model = config('terracotta.namespace') . rtrim($item, '.php');
            $items[] = [
                'title' => $model::title(),
                'icon' => $model::icon(),
                'priority' => $model::priority(),
                'uuid' => Str::uuid()
            ];
        }

        return collect($items)->sortByDesc(function ($item) {
            return $item['priority'];
        })->values()->all();
    }
}
