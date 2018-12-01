<?php
namespace app\admin\model;

use think\Model;
use think\Db;
use app\common;
class AdminModel extends Model {

    /**
     * 获取管理员登陆信息
     *
     * @param [String] $account   账户
     * @param [String] $password  密码
     * @return void
     */
    public static function getAdminInfoToPwd($account, $password)
    {
        $pwd = md5($password);

        $adminInfo = db('Admin')
            ->where('account', $account)
            ->where('password', $pwd)
            ->where('status', 1)
            ->find();
        
        return $adminInfo;
    }

    
    /**
     * 获取管理员登陆信息
     *
     * @param [type] $token
     * @return void
     */
    public static function getAdminInfoToId($admin_id)
    {
        $adminInfo = db('Admin')
            ->where('id', $admin_id)
            ->find();
        return $adminInfo;
    }

    /**
     * 插入AdminToken
     *
     * @param [type] $admin_id
     * @param [type] $token
     * @return void
     */
    public static function insertAdminToken($admin_id, $token)
    {   
        $flag = db('TokenAdmin')->insert([
            'admin_id'    => $admin_id,
            'token'       => $token,
            'create_time' => time(),
            'login_time'  => time()
        ]);
        return $flag;
    }
    
    /**
     * 更新AdminToken
     *
     * @param [type] $admin_id
     * @param [type] $token
     * @return void
     */
    public static function updateAdminToken($admin_id, $token)
    {   
        $flag = db('TokenAdmin')->where('admin_id', $admin_id)->update([
            'token'       => $token,
            'login_time'  => time()
        ]);
        return $flag;
    }

    /**
     * 查询AdminToken
     *
     * @param [type] $admin_id
     * @return void
     */
    public static function selectAdminToken($admin_id)
    {   
        $token = db('TokenAdmin')->where('admin_id', $admin_id)->value('token');
        return $token;
    }
    
    /**
     * 查询AdminId
     *
     * @param [type] $token
     * @return void
     */
    public static function selectAdminId($token)
    {   
        $admin_id = db('TokenAdmin')->where('token', $token)->value('admin_id');
        return $admin_id;
    }
}