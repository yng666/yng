<?php
namespace Yng;
header('Content-type:text/html;charset=utf-8');

/*
|--------------------------------------------------------------------------
| 入口文件
|--------------------------------------------------------------------------
*/

// 自动加载
require_once __DIR__ . '/../vendor/autoload.php';


ini_set('display_errors','On');

// 开始执行
use Yng\App;

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);

