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
        ],
        [
            'matcher' => function () {
                if (in_array($_SERVER['REQUEST_URI'], ['/create'])) {
                    return true;
                }
                return false;
            },
            'uses' => function () {
                return (new \App\Modules\HomeModule())->create();
            }
        ],
    ],
    'database' => [
        'name' => 'shortr',
        'user' => 'root',
        'pass' => 'root',
        'host' => '127.0.0.1'
    ]
];