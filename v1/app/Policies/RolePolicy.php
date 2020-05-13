<?php

namespace App\Policies;

use App\User;
use App\Traits\PermissionPolicy;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'roles';
    private $modelClass = Role::class;
}
