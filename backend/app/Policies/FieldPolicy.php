<?php

namespace App\Policies;

use App\User;
use App\Field;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class FieldPolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'fields';
    private $modelClass = Field::class;
}
