<?php

// +----------------------------------------------------------------------
// | 日志设置
// +----------------------------------------------------------------------
return [
    // 默认日志记录通道
    'default'      => env('LOG_CHANNEl', 'file'),
    // 日志记录级别
    'level'        => [],
    // 日志类型记录的通道 ['error'=>'email',...]
    'type_channel' => [],
    // 关闭全局日志写入
    'close'        => false,
    // 全局日志处理 支持闭包
    'processor'    => null,

    // 日志通道列表
    'channels'     => [
        'file' => [
            'type'           => 'File',// 日志记录方式

            'path'           => '',// 日志保存目录

            'single'         => false,// 单文件日志写入

            'apart_level'    => ['sql'],// 独立日志级别

            'max_files'      => 0,// 最大日志文件数量

            'json'           => false,// 使用JSON格式记录

            'processor'      => null,// 日志处理

            'close'          => false,// 关闭通道日志写入

            'format'         => '[%s][%s][%s] %s',// 日志输出格式化

            'time_format'    => 'Y-m-d H:i:s',// 日期输出格式,默认c(2023-03-17T17:03:39+08:00)

            'realtime_write' => true,// 是否实时写入
        ],
        // 其它日志通道配置
    ],
];
