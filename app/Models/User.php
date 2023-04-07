<?php
namespace App\Models;

use Yng\Model;

/**
 * user模型
 */
class User extends Model{
    // 设置模型名
    // protected $name = 'user';

    // 设置当前模型对应的完整数据表名称
    // protected $table = 'user';

    // // 设置当前模型的数据库连接
    // protected $connection = 'mysql';

    // // 设置当前主键,默认id
    // protected $pk = 'id';

    // //创建时间字段 false表示关闭
    // protected $createTime = 'created_time';

    // //更新时间字段 false表示关闭
    // protected $updateTime = 'updated_time';
    
    /**
     * 获取用户列表数据
     */
    public function getLst(){
        // return self::toSql()->find(1);
        // return self::find(1);
        // return self::first();
        return self::where('id',3)->first();
    }

}