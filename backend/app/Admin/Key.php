<?php

namespace App\Admin;

use App\TerraCotta;

class Key extends TerraCotta
{
    public static $model = '\App\Models\Key';

    public static function icon(): string
    {
        return 'safe-svg';
    }
}
