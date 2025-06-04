<?php

use Illuminate\Support\Str;

return [

    'default' => env('DB_CONNECTION', 'sqlite'),

    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        // External project databases

        'invoicing' => [
            'driver' => env('INVOICING_DB_CONNECTION', 'mysql'),
            'host' => env('INVOICING_DB_HOST', '127.0.0.1'),
            'port' => env('INVOICING_DB_PORT', '3306'),
            'database' => env('INVOICING_DB_DATABASE', 'laravel'),
            'username' => env('INVOICING_DB_USERNAME', 'root'),
            'password' => env('INVOICING_DB_PASSWORD', ''),
        ],
        'minecraftlist' => [
            'driver' => env('MCLIST_DB_CONNECTION', 'mysql'),
            'host' => env('MCLIST_DB_HOST', '127.0.0.1'),
            'port' => env('MCLIST_DB_PORT', '3306'),
            'database' => env('MCLIST_DB_DATABASE', 'laravel'),
            'username' => env('MCLIST_DB_USERNAME', 'root'),
            'password' => env('MCLIST_DB_PASSWORD', ''),
        ],

    ],

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
