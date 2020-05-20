<?php

namespace App\Admin;

use App\TerraCotta;

class Tag extends TerraCotta
{
    public static $model = '\App\Tag';

    public static function icon(): string
    {
        return 'tag-svg';
    }
}
