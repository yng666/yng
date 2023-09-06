<?php

/*
|--------------------------------------------------------------------------
| 邮箱配置
|--------------------------------------------------------------------------
*/
return [
    
    // 邮件驱动 支持smtp,mail,sendmail,qmail,默认SMTP
    'mail_mailer'     => 'SMTP',

    // 是否调试,0无输出，1输出客户端信息，2输出客户端和服务端信息，3显示连接状态，客户端 -> 服务器和服务器 -> 客户端消息，4显示所有消息
    'mail_debug'      => env('mail_debug',0),

    // 主机地址：例如smtp.qq.com, smtp.163.com等
    'mail_host'       => env('mail_host','smtp.qq.com'),

    // 是否启用smtp认证，true/false
    'mail_smtpauth'   => env('mail_smtpauth',true),

    // 发件人邮箱
    'mail_username'   => env('mail_username','yng@example.com'),

    // 授权码
    'mail_password'   => env('mail_password',''),

    // 端口号 常用有465, 25;具体看官方设置
    'mail_port'       => env('mail_port',25),

    // 协议,支持ssl, tls
    'mail_smtpsecure' => 'ssl',

    // 发件人名称
    'mail_from_name'  => '野牛哥',

    // 是否输出异常信息
    'mail_is_error'   => true,

    // 超时时间,默认5分钟,单位秒
    'mail_timeout'    => env('mail_timeout',300),

    // 日志存放路径,为空默认不存,绝对路径
    'mail_log_path'   => '',

    // 邮件编码,默认utf-8
    'mail_charset'    => env('mail_charset','utf-8'),

];