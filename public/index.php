<?php
namespace Yng;

/*
|--------------------------------------------------------------------------
| 入口文件
|--------------------------------------------------------------------------
*/

// 自动加载
require_once __DIR__ . '/../vendor/autoload.php';


// 开始执行
use Yng\App;

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);
