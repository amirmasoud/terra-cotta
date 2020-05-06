<?php

namespace App\Policies;

use App\Icon;
use Illuminate\Auth\Access\HandlesAuthorization;

class IconPolicy
{
    use HandlesAuthorization;

    private $modelName = 'icons';
    private $modelClass = Icon::class;
}
