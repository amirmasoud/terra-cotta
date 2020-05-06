<?php

namespace App\Policies;

use App\Safe;
use Illuminate\Auth\Access\HandlesAuthorization;

class SafePolicy
{
    use HandlesAuthorization;

    private $modelName = 'safes';
    private $modelClass = Safe::class;
}
