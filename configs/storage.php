<?php

return [
    'default' => [
        'import' => 'remote',
        'export' => 'remote'
    ],

    'imports' => [
        'remote' => [
            'service_class' => \nikitakilpa\FileManager\Services\Impls\ImportService::class,
            'driver' => 'sftp',
            'dir_path' => '/home/n.kilpa',
            'import_path' => '/local/imports'
        ],

    ],
    'exports' => [
        'remote' => [
            'service_class' => \nikitakilpa\FileManager\Services\Impls\ExportService::class,
            'driver' => 'sftp',
            'dir_path' => '/home/n.kilpa',
            'export_path' => '/local/exports'
        ]
    ]
];

