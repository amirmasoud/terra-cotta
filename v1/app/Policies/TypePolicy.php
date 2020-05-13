<?php

namespace App\Policies;

use App\User;
use App\Type;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'types';
    private $modelClass = Type::class;
}
