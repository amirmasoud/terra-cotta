<?php

namespace App\Policies;

use App\Field;
use Illuminate\Auth\Access\HandlesAuthorization;

class FieldPolicy
{
    use HandlesAuthorization;

    private $modelName = 'fields';
    private $modelClass = Field::class;
}
