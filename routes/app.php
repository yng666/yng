<?php

use Yng\Facade\Route;

Route::get('/', function () {
    return 'hello,YngPHP!';
});

Route::get('hello/:name', 'index/hello');
