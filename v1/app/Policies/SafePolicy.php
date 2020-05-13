<?php

namespace App\Policies;

use App\User;
use App\Safe;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class SafePolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'safes';
    private $modelClass = Safe::class;
}
