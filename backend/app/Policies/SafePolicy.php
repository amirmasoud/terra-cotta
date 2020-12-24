<?php

namespace App\Policies;

use App\Models\Key;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeyPolicy
{
    use HandlesAuthorization;

    private $modelName = 'keys';
    private $modelClass = Key::class;
}
