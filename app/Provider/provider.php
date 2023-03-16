<?php
use app\ExceptionHandle;
use app\Request;
use Yng\trace\Service;

// 容器提供者定义文件
return [
    'Yng\Request'           => Request::class,
    'Yng\exception\Handle'  => ExceptionHandle::class,
    'Yng\trace\Service'     => Service::class,
];
