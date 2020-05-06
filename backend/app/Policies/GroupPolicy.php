<?php

namespace App\Policies;

use App\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    private $modelName = 'groups';
    private $modelClass = Group::class;
}
