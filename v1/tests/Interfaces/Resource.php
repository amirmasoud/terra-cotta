<?php

namespace Tests\Interfaces;

interface Resource
{
    public const COLLECTION_STRUCTURE = [
        'data',
        'meta' => [
            'count',
            'total_pages',
            'next_page_url',
            'prev_page_url',
            'current_page',
            'from',
            'last_page',
            'path',
            'per_page',
            'to',
            'total'
        ],
        'links' => [
            'first',
            'last',
            'prev',
            'next'
        ]
    ];

    public const RESOURCE_CREATED_CODE = 201;
    public const RESOURCE_DELETED_CODE = 204;
    public const RESOURCE_UPDATED_CODE = 204;
}
