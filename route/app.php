<?php
use Yng\Facade\Route;

Route::get('/', function () {
    return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;text-align:center;margin-top:300px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ color: #ed6954;font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>YNGPHP</h1><br/><span style="font-size:30px;">[V' . \Yng\Facade\App::version() .']打造更快更优雅的PHP框架</span></p>';
});


Route::get('hello/:name', '\App\Controller\Index\Index\hello');
