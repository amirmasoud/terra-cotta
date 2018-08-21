<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Safe;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get home page basic statistics.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $usersCount = User::count();
        $safesCount = Safe::count();
        $categoriesCount = Category::count();
        $tagsCount = Tag::count();

        return [
            'data' => [
                'users_count' => $usersCount,
                'safes_count' => $safesCount,
                'categories_count' => $categoriesCount,
                'tags_count' => $tagsCount,
            ]
        ];
    }
}
