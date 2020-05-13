<?php

namespace App\Policies;

use App\User;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'users';
    private $modelClass = User::class;
}
