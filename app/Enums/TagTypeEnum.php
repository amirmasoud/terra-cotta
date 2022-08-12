<?php

namespace App\Enums;

enum TagTypeEnum: string
{
    case FOLDER = 'folder';

    public function label(): string
    {
        return match ($this) {
            self::FOLDER => __('Folder'),
        };
    }
}
