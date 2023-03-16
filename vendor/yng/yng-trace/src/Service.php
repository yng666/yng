<?php
namespace Yng\Trace;

use Yng\Service as BaseService;

class Service extends BaseService
{
    public function register()
    {
        $this->app->middleware->add(TraceDebug::class);
    }
}
