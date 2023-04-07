<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 默认文件缓存存储
    |--------------------------------------------------------------------------
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | 缓存存储
    |--------------------------------------------------------------------------
    */

    'stores' => [
        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.'data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            // 'connection' => 'cache',
            'prefix' => env('CACHE_PREFIX', env('APP_NAME', 'Yng').'_CACHE_'),
            // 'lock_connection' => 'default',
            'host'       => env('REDIS_HOST','127.0.0.1'),
            'port'       => env('REDIS_PORT', 6379),
            'password'   => env('REDIS_PASSWORD','')
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 缓存键前缀
    |--------------------------------------------------------------------------
    */

    'prefix' => env('CACHE_PREFIX', env('APP_NAME', 'Yng').'_cache'),

];
