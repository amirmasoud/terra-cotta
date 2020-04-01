<?php

namespace App\Policies;

use App\User;
use App\Group;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'groups';
    private $modelClass = Group::class;
}
