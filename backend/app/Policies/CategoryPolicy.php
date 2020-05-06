<?php

namespace App\Policies;

use App\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    private $modelName = 'categories';
    private $modelClass = Category::class;
}
