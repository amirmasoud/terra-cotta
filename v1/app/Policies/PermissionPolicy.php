<?php

namespace App\Policies;

use App\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Traits\PermissionPolicy as PermissionPolicyTrait;

class PermissionPolicy
{
    use HandlesAuthorization, PermissionPolicyTrait;

    private $modelName = 'permissions';
    private $modelClass = Permission::class;
}
