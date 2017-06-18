<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Media Folders
    |--------------------------------------------------------------------------
    |
    | Configure (nested) folders to which files may be uploaded.
    |
    */

    'folders' => [

        // The default folder to use, if any.
        'default' => 'default',

        // Global or default configuration options for
        'global' => [

        ],

        // Each folder, identified by key, can have its own (overriding) configuration.
        // It is possible to set required permissions and automatic resizes here.
        'folders' => [

            'default' => [
            ],

            'test' => [
                'permissions' => [
                    'create' => 'media.test.testing',
                    'edit'   => 'media.test.testing',
                    'delete' => 'media.test.testing-delete',
                ],
                'resizes' => [
                    'test-one',
                    'another'
                ]
            ]

        ],

        // Where file are uploaded
        'path' => storage_path('cms_uploads'),

    ],

    /*
    |--------------------------------------------------------------------------
    | File storage
    |--------------------------------------------------------------------------
    |
    | Where and how uploaded files are stored.
    |
    */

    'store' => [

        // Available drivers:
        // 's3', 'filesystem'
        'driver' => 'filesystem',

        // Configuration options per driver
        'filesystem' => [
            'directory' => 'cms-media-library',
        ],

        's3' => [
            'prefix' => 'cms-media-library',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Resizes
    |--------------------------------------------------------------------------
    |
    | Configuration for automatic image resizes.
    |
    */

    'resizes' => [

    ],

];
