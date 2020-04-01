<?php

namespace App\Policies;

use App\User;
use App\Icon;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class IconPolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'icons';
    private $modelClass = Icon::class;
}
