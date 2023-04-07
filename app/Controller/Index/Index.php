<?php
namespace App\Controller\Index;
use App\Controller\BaseController;
use App\Models\User;
use Yng\Cache\Driver\Redis;
use Yng\Facade\Cache;
use Yng\Facade\Request;
use Yng\Facade\Session;
use Yng\Response;

/**
 * index控制器
 */
class Index extends BaseController{


    /**
     * 获取随机语录
     * 限制: 1个ip在1分钟内只能获取5条
     * @return array void
     */
    public function getSayings(Redis $redis){
        try {
            $ip  = $this->getClientIp();
            $key = "SAYINGS_{$ip}";

            $nums = Cache::store('redis')->inc($key);

            if($nums == 1 && Cache::store('redis')->get($key)){
                // 设置过期时间,因为我在config/cache配置添加了缓存前缀,但是这里他是通过门面调用的,所以需要手动添加缓存前缀
                Cache::store('redis')->expire(env('APP_NAME', 'Yng').'_CACHE_'.$key,60);
                // $res = $redis->expire(env('APP_NAME', 'Yng').'_CACHE_'.$key,60);
                // dd($res);
            }

            if($ip != '127.0.0.1' && $nums > 5){
                return ['status' => 500,'msg' => '请求频繁'];
            }

            $res = $this->getRandSayings();
            return ['status' => 200,'msg' => $res];            
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function demo(Request $request){

        // $userinfo = app(User::class)->getLst();

        
        // cookie('demosa','666666');
        // $cookie = cookie('demosa');
        // dd(lang('about'));
        // dd(\Yng\Facade\App::getRootPath() . '404.html');
        // abort(404);

        // Response::create(public_path().'404.html', 'view', 400)->assign(['e' => '页面异常']);
        // return ;
        // dd(123132);
        return view('index/index',['username' => 123123,'session' => '']);
    }



}