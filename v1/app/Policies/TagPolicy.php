<?php

namespace App\Policies;

use App\Tag;
use App\User;
use App\Traits\PermissionPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization, PermissionPolicy;

    private $modelName = 'tags';
    private $modelClass = Tag::class;
}
