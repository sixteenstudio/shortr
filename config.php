<?php

return [
    'dependencies' => [
        'shared' => [],
        'bound' => [],
    ],
    'routes' => [
        [
            'matcher' => function () {
                if ($_SERVER['request_uri'] === '/') {

                }
            },
            'uses' => function () {

            }
        ]
    ]
];