<?php
declare (strict_types = 1);

namespace App\Controller;

use Yng\App;
use Yng\Exception\ValidateException;
use Yng\Validate;
use Yng\Facade\Log;
use PHPMailer\PHPMailer\PHPMailer as YNGPHPMailer;
/**
 * 控制器基础类
 */
abstract class BaseController
{
    /**
     * Request实例
     * @var \think\Request
     */
    protected $request;

    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;

    /**
     * 是否批量验证
     * @var bool
     */
    protected $batchValidate = false;

    /**
     * 控制器中间件
     * @var array
     */
    protected $middleware = [];

    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $this->request = $this->app->request;

        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {}

    /**
     * 验证数据
     * @access protected
     * @param  array        $data     数据
     * @param  string|array $validate 验证器名或者验证规则数组
     * @param  array        $message  提示信息
     * @param  bool         $batch    是否批量验证
     * @return array|string|true
     * @throws ValidateException
     */
    protected function validate(array $data, $validate, array $message = [], bool $batch = false)
    {
        if (is_array($validate)) {
            $v = new Validate();
            $v->rule($validate);
        } else {
            if (strpos($validate, '.')) {
                // 支持场景
                [$validate, $scene] = explode('.', $validate);
            }
            $class = false !== strpos($validate, '\\') ? $validate : $this->app->parseClass('validate', $validate);
            $v     = new $class();
            if (!empty($scene)) {
                $v->scene($scene);
            }
        }

        $v->message($message);

        // 是否批量验证
        if ($batch || $this->batchValidate) {
            $v->batch(true);
        }

        return $v->failException(true)->check($data);
    }


    /**
     * 发送邮箱
     * @param string $to 收件人邮箱
     * @param string $title 邮箱标题
     * @param string $content 邮箱内容
     */
    public function sendEmail(string $to,string $title,string $content){
        try {
            $debug    = env('mail_debug',0);
            $host     = env('mail_port','smtp.qq.com');
            $username = env('mail_username','djx168168@qq.com');
            $password = env('mail_password','lysexohnmrkzbbdb');
            $port     = env('mail_port',465);
            $name     = env('mail_from_name','野牛哥');

            $mail = new YNGPHPMailer(true);
            $mail->SMTPDebug = $debug; //调试模式输出(SMTP::DEBUG_SERVER),1开启调试，0关闭,默认为0,具体看G:\phpstudy_pro\WWW\yngphp\vendor\phpmailer\phpmailer\src\PHPMailer.php 394行
            $mail->isSMTP(); //使用SMTP
            $mail->Host       = $host; //SMTP服务器
            $mail->SMTPAuth   = true; //允许 SMTP 认证
            $mail->Username   = $username; //SMTP 用户名  即邮箱的用户名
            $mail->Password   = $password; //SMTP 授权码
            $mail->SMTPSecure = YNGPHPMailer::ENCRYPTION_SMTPS; //允许 TLS 或者ssl协议
            $mail->Port       = $port;//服务器端口 25 或者465 具体要看邮箱服务器支持
    
            //收件人
            $mail->setFrom($username,$name);//发件人,第二参数为发件人的名字(下面同理)
            $mail->addAddress($to); //收件人
            // $mail->addAddress('ellen@example.com'); //添加多个收件人
            $mail->addReplyTo($username,$name);//回复的时候回复给哪个邮箱 建议和发件人一致
            // $mail->addCC('cc@example.com');//抄送
            // $mail->addBCC('bcc@example.com');//密送
    
            //发送附件
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // 添加附件
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //发送附件并且重命名
    
            //内容
            $mail->isHTML(true); //是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = $title;//这里是邮件标题
            $mail->Body = '<style>
            .yng{width: 550px;margin: 0 auto;border-radius: 8px;overflow: hidden;font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;box-shadow: 0 2px 12px 0 rgb(0 0 0 / 10%);word-break: break-all;}
            .yng_title{color: #fff;background: linear-gradient(-45deg,rgba(9,69,138,0.2),rgba(68,155,255,0.7),rgba(117,113,251,0.7),rgba(68,155,255,0.7),rgba(9,69,138,0.2));background-size: 400% 400%;background-position: 50% 100%;padding: 15px;font-size: 15px;line-height: 1.5;}</style><div class="yng"><div class="yng_title">'.$title.'</div><div style="background: #fff;padding: 20px;font-size: 13px;color: #666;"><div style="padding: 15px;margin-bottom: 20px;line-height: 1.5;background: repeating-linear-gradient(145deg, #f2f6fc, #f2f6fc 15px, #fff 0, #fff 25px);">'.$content.'</div><div style="line-height: 2">请注意：此邮件由系统自动发送，请勿直接回复。</div></div></div>';//这里是邮件内容
            $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';//如果邮件客户端不支持HTML则显示此内容
    
            $res=$mail->send();
            return $res;
        } catch (\Exception $th) {
            // 写失败日志
            // '邮件发送失败: '. $mail->ErrorInfo;
            Log::error($th->getMessage());
            return false;
        }
    }


    /**
     * 获取用户真实 ip
     * @return array|false|mixed|string
     */
    function getClientIp(){
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }
        if (getenv('HTTP_X_REAL_IP')) {
            $ip = getenv('HTTP_X_REAL_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
            $ips = explode(',', $ip);
            $ip = $ips[0];
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = '127.0.0.1';
        }

        return $ip;
    }

    /**
     * 随机获取语录
     * @return string
     */
    public function getRandSayings(){
        $arr = [
            '目标的坚定是性格中最必要的力量源泉之一，也是成功的利器之一。没有它，天才也会在矛盾无定的迷径中徒劳无功。',
            '说大话哄人惯了，连自己也哄相信--这是极普通的心理现象。《围城》',
            '旅行是最劳顿，最麻烦，叫人本相必现的时候。经过长期苦旅行而彼此不讨厌的人，才可以结交作朋友。',
            '失败往往是黎明前的黑暗，继之而出现的就是成功的朝霞。',
            '珍藏心中过往的甜蜜回忆，此刻，我们放飞青春的梦想。',
            '时间如流水，不知合理利用，剩下的只有后悔。',
            '生活可能并非我们期待后舞台，但既然来了，我们就要翩翩起舞。',
            '事实上，成功仅代表了你工作的1%，成功是99%失败的结果。',
            '其实路并没有错，错的是选择，爱并没有错，错的是缘分，所以无论何地，一路的风景总是有限的，终究会有美好的。',
            '如果不醒来，那么现实和梦境又有何分别。',
            '每一次努力都是最优的亲近，每一滴汗水都是机遇的滋润。',
            '我不怕自己努力了不成功，我只怕比我成功的人，比我更努力。',
            '成大事不在于力量有多大，而在于能坚持多久。',
            '对于最有能力的领航人风浪总是格外的汹涌。',
            '白白的过一天，无所事事，就像犯了偷盗罪一样。',
            '永远坚信这一点：太阳落了还会升起，不幸的日子总会有尽头，过去是这样，将来也是这样。',
            '人生是无止境的，只有积极、勇敢、乐观地面对生活、成败、困难，才会像大树一样枝繁叶茂。',
            '人生中，我们有着快乐与悲伤，所以不断努力就能获得成功。',
            '天将降大任于是人也；必先苦其心志，劳其筋骨，饿其体肤，空乏其身，行弗乱其所为，所以动心忍性，增益其所不能。',
            '那些出类拔萃的人，正是在生活的早期就清楚地辨明了自己的方向，并且始终如一瞄准这一目标的人。',
            '无一事不学，无一时不学，无一处不学，成功之路也。',
            '人生是船，自信是帆，要想船走，必须升帆。',
            '放弃等于零，坚持就有希望，有希望就可能成功。',
        ];
        $count = count($arr);

        $idx = mt_rand(0, $count-1);

        $res = $arr[$idx];

        return $res;
    }

}
