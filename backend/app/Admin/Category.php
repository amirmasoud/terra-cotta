<?php

namespace App\Admin;

use App\TerraCotta;

class Category extends TerraCotta
{
    public static $model = '\App\Category';

    public static function icon(): string
    {
        return 'category-svg';
    }
}
