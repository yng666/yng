<?php
namespace App\Controller\Index;
use App\Controller\BaseController;
use App\Models\User;
use Yng\Cache\Driver\Redis;
use Yng\Facade\Cache;
use Yng\Facade\Db;
use Yng\Facade\Log;
use Yng\Facade\Request;
use Yng\Facade\Session;
use Yng\Response;
use Yng\Mailer\YNGMailer;
use Yng\Facade\Queue;
use App\Job\DemoJob;
use Yng\Captcha\Facade\Captcha;
/**
 * index控制器
 */
class Index extends BaseController{

    public function hello($name = 'YNGPHP')
    {
        return 'Hello! Welcome to use ' . $name;
    }
}