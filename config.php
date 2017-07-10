<?php

return [
    'dependencies' => [
        'shared' => [
            \App\View::class => \App\View::class,
            \App\Repositories\Contracts\UrlRepository::class => \App\Repositories\PDO\UrlRepository::class
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
        [
            'matcher' => function () {
                if (in_array($_SERVER['REQUEST_URI'], ['/my-urls'])) {
                    return true;
                }
                return false;
            },
            'uses' => function () {
                return (new \App\Modules\UrlModule())->myUrls();
            }
        ],
        [
            'matcher' => function () {
                if (strpos($_SERVER['REQUEST_URI'], '/g/') !== -1 && strlen($_SERVER['REQUEST_URI']) > 3) {
                    return true;
                }
                return false;
            },
            'uses' => function () {
                return (new \App\Modules\UrlModule())->redirect(explode('/g/', $_SERVER['REQUEST_URI'])[1]);
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