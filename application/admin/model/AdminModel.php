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
    public static function getAdminToken($account, $password){
        $pwd = md5($password);

        $adminInfo = db('Admin')
            ->where('account', $account)
            ->where('password', $pwd)
            ->where('status', 1)
            ->find();

        
        print_r($adminInfo);die;
        return $info;
    }
}