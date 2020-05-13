<?php

return [
    'map' => [
        'filter' => [
            // Param
            'name' => [
                'column' => 'name'
            ]
        ],
        'order' => [
            'sort'
        ],
        'paginate' => 'per_page',
    ],

    'search' => [
        'columns' => [
            'name',
        ],
        'clause' => 'LIKE'
    ],

    'default' => [
        'per_page' => 15,
    ],

    'model' => [
        \App\Safe::class => [
            'map' => [
                'filter' => [
                    'category' => [
                        'column' => 'category_id',
                        'relationship' => 'categories'
                    ],
                    'tag' => [
                        'column' => 'id',
                        'relationship' => 'tags'
                    ],
                ],
            ]
        ]
    ]
];
