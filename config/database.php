<?php

return [
    // 默认使用的数据库连接配置
    'default' => env('DB_CONNECTION', 'mysql'),

    // 自定义时间查询规则
    'time_query_rule' => [],

    // 自动写入时间戳字段
    // true为自动识别类型 false关闭
    // 字符串则明确指定时间字段类型 支持 int timestamp datetime date
    'auto_timestamp'  => true,

    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',

    // 时间字段配置 配置格式：create_time,update_time
    'datetime_field'  => '',

    // 数据库连接配置信息
    'connections' => [

        'mysql' => [
            'type'            => 'mysql',// 数据库类型
            'hostname'        => env('DB_HOST', '127.0.0.1'),// 服务器地址
            'hostport'        => env('DB_PORT', '3306'),// 端口
            'database'        => env('DB_DATABASE', 'forge'),// 数据库名
            'username'        => env('DB_USERNAME', 'forge'),// 用户名
            'password'        => env('DB_PASSWORD', ''),// 密码
            'charset'         => 'utf8mb4',// 数据库编码默认采用utf8
            'prefix'          => env('DB_PREFIX', ''),// 数据库表前缀
            'params'          => [],// 数据库连接参数
            'deploy'          => 0,// 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
            'rw_separate'     => false, // 数据库读写是否分离 主从式有效
            'master_num'      => 1,// 读写分离后 主服务器数量
            'slave_no'        => '',// 指定从服务器序号
            'fields_strict'   => true,// 是否严格检查字段是否存在
            'break_reconnect' => false,// 是否需要断线重连
            'trigger_sql'     => env('APP_DEBUG', true), // 监听SQL
            'fields_cache'    => false, // 开启字段缓存
        ],

        'pgsql' => [
            'type'           => 'pgsql',
            'hostname'       => env('DB_HOST', '127.0.0.1'),
            'hostport'       => env('DB_PORT', '5432'),
            'database'       => env('DB_DATABASE', 'forge'),
            'username'       => env('DB_USERNAME', 'forge'),
            'password'       => env('DB_PASSWORD', ''),
            'charset'        => 'utf8',
            'prefix'         => env('DB_PREFIX', ''),
        ],

        'sqlsrv' => [
            'type'           => 'sqlsrv',
            'hostname'       => env('DB_HOST', 'localhost'),
            'hostport'       => env('DB_PORT', '1433'),
            'database'       => env('DB_DATABASE', 'forge'),
            'username'       => env('DB_USERNAME', 'forge'),
            'password'       => env('DB_PASSWORD', ''),
            'charset'        => 'utf8',
            'prefix'         => '',
           
        ],

    ],
];
