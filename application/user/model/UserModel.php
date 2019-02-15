<?php
namespace app\user\model;

use think\Model;
use think\Db;
use app\common;
class UserModel extends Model {

    public static function getUserTotal()
    {   
        $count = db('User')->count();
        return $count;
    }

    /**
     * 验证是否注册
     *
     * @param [string] $openid 微信openid
     * @return void
     */
    public static function checkRegist($openid)
    {
        // 验证是否存在openid
        if (empty($openid)) {
            exception('用户信息获取失败', 1001);
        }
        $userId = db('User')->where('open_id', $openid)->value('id');
        return $userId;
    }
    
    public static function getUserToken()
    {

    }

}