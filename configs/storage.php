<?php

return [
    'default' => 'local',

    'storages' => [
        'remote' => [
            'class' => \nikitakilpa\FileManager\Services\Impls\ImportService::class,
            'disk' => 'sftp',
            'path' => '/home/n.kilpa',
            'export_path' => '/home/n.kilpa/exports',
            'import_path' => '/home/n.kilpa/imports',
        ],
        'local' => [
            'class' => \nikitakilpa\FileManager\Services\Impls\ImportService::class,
            'disk' => 'local',
            'path' => '/local',
            'export_path' => '/local/exports',
            'import_path' => '/local/imports',
        ]
    ]
];

