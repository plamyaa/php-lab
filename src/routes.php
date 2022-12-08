<?php

return [
    '~^articles/(\d+)/edit$~' => [
        \MyProject\Controllers\ArticlesController::class,
        'edit',
    ],
    '~^articles/(\d+)/delete$~' => [
        \MyProject\Controllers\ArticlesController::class,
        'delete',
    ],
    '~^articles/add$~' => [
        \MyProject\Controllers\ArticlesController::class,
        'add',
    ],
    '~^articles/(\d+)$~' => [
        \MyProject\Controllers\ArticlesController::class,
        'view',
    ],
    '~^articles/(\d+)/comments$~' => [
        \MyProject\Controllers\CommentsController::class,
        'add',
    ],
    '~^comments/(\d+)/edit$~' => [
        \MyProject\Controllers\CommentsController::class,
        'edit',
    ],
    '~^comments/(\d+)/update$~' => [
        \MyProject\Controllers\CommentsController::class,
        'update',
    ],
    '~^comments/(\d+)/delete$~' => [
        \MyProject\Controllers\CommentsController::class,
        'delete',
    ],

    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
];
