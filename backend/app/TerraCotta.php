<?php

namespace App;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class TerraCotta
{
    /**
     * Default title of the resource.
     *
     * @return string
     */
    public static function title(): string
    {
        return str_replace('-', ' ', Str::of(get_called_class())->afterLast('\\')->kebab()->title());
    }

    /**
     * Icon of the resource.
     *
     * @return string
     */
    public static function icon(): string
    {
        return 'file-svg';
    }

    /**
     * priority of menu item.
     *
     * @return integer
     */
    public static function priority(): int
    {
        return 10;
    }
}
