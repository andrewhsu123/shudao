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
    
    /**
     * 更新并获取token
     *
     * @param [int] $userId 用户编号
     * @return void
     */
    public static function getUserToken($userId)
    {
        $token = createToken();
        $data  = [
            'token' => $token,
            'expire_time' => time() + 86400,
            'login_time'  => time()
        ];
        $flag  = db('TokenUser')->where('id', $userId)->save($data);
        return $token;
    }

    /**
     * 新建用户创建token
     *
     * @return void
     */
    public static function createUserToken($userInfo)
    {
        $token = createToken();
        $data  = [
            'open_id'  => $userInfo['openid'],
            'nickname' => $userInfo['nickname'],
            'sex'      => $userInfo['sex'],
            'status'   => 1,
        ];
        db('TokenUser')->insert($data);
        $userId = db('TokenUser')->getLastInsID();
        $result = ['userId'=>$userId, 'token'=>$token];
        return $result;
    }

}