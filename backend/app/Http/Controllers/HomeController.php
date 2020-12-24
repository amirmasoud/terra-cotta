<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Key;
use App\Models\Category;
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
        $keysCount = Key::count();
        $categoriesCount = Category::count();
        $tagsCount = Tag::count();

        return [
            'data' => [
                'users_count' => $usersCount,
                'keys_count' => $keysCount,
                'categories_count' => $categoriesCount,
                'tags_count' => $tagsCount,
            ]
        ];
    }
}
