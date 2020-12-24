<?php

namespace App\Admin;

use App\TerraCotta;

class User extends TerraCotta
{
    public static $model = '\App\Models\User';

    public static function priority(): int
    {
        return 20;
    }

    public static function icon(): string
    {
        return 'user-svg';
    }
}
