<?php

namespace App\Policies;

use App\User;
use App\Category;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'users';
    private $modelClass = Category::class;
}
