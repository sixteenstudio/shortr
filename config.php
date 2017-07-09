<?php

return [
    'dependencies' => [
        'shared' => [
            \App\View::class => \App\View::class
        ],
        'bound' => [],
    ],
    'routes' => [
        [
            'matcher' => function () {
                if (in_array($_SERVER['request_uri'], ['/', ''])) {
                    return true;
                }
                return false;
            },
            'uses' => function () {

            }
        ]
    ]
];