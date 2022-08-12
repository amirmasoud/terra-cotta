<?php

namespace App\Enums;

enum FieldTypeEnum: string
{
    case TEXT = 'text';
    case HIDDEN = 'hidden';
    case BOOLEAN = 'boolean';
    case URL = 'url';

    public function label(): string
    {
        return match ($this) {
            self::TEXT => __('Text'),
            self::HIDDEN => __('Hidden'),
            self::BOOLEAN => __('Boolean'),
            self::URL => __('URL'),
        };
    }
}
