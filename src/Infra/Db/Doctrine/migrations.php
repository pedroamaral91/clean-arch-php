<?php

return [
    'table_storage' => [
        'table_name'                 => 'public',
        'version_column_name'        => 'version',
        'version_column_length'      => 1024,
        'executed_at_column_name'    => 'executed_at',
        'execution_time_column_name' => 'execution_time',
    ],

    'migrations_paths' => [
        'Clean\Api\Infra\Db\Doctrine\Migrations' => '/Migrations',
    ],

    'all_or_nothing'          => true,
    'check_database_platform' => true,
    'organize_migrations'     => 'none',
];
