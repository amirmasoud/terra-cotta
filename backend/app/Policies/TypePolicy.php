<?php

namespace App\Policies;

use App\Type;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
{
    use HandlesAuthorization;

    private $modelName = 'types';
    private $modelClass = Type::class;
}
