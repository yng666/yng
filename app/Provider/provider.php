<?php
use Yng\Exception\Handle as ExceptionHandle;
use Yng\Request;
use Yng\Trace\Service;

// 容器提供者定义文件
return [
    'Yng\Request'           => Request::class,
    'Yng\Exception\Handle'  => ExceptionHandle::class,
    'Yng\Trace\Service'     => Service::class,
];
