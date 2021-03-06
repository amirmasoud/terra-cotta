<?php

namespace App\Policies;

use App\Models\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    private $modelName = 'tags';
    private $modelClass = Tag::class;
}
