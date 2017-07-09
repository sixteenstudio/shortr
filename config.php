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
                if (in_array($_SERVER['REQUEST_URI'], ['/', ''])) {
                    return true;
                }
                return false;
            },
            'uses' => function () {
                return (new \App\Modules\HomeModule())->index();
            }
        ]
    ]
];