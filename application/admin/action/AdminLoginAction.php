<?php

namespace app\admin\action;

use think\Model;
use think\Db;

use app\admin\model\AdminModel;

class AdminLoginAction {

    /**
     * 获取登陆Token
     *
     * @param [String] $account   账户
     * @param [String] $password  密码
     * @return void
     */
    public static function getAdminToken($account, $password){
        
        $adminInfo = AdminModel::getAdminInfoToPwd($account, $password);
        if (empty($adminInfo)) {
            exception("用户名或密码错误");
        }
        $token = self::tokenGet();
        $flag = self::setAdminToken($adminInfo['id'], $token);
        if (!$flag) {
            exception("登陆失败");
        }
        return $token;
        
    }

    /**
     * 获取用户信息
     *
     * @param [String] $token
     * @return void
     */
    public static function getAdminInfo($token){

        $admin_id  = AdminModel::selectAdminId($token);
        if (empty($admin_id)) {
            exception("token不存在或已过期");
        }
        $adminInfo = AdminModel::getAdminInfoToId($admin_id);
        if (empty($adminInfo)) {
            exception("管理员权限不足");
        }
        return $adminInfo;
        
    }
    
    /**
     * 设置AdminToken
     *
     * @param [int]    $admin_id 管理员编号
     * @param [String] $token    要设置的token
     * @return void
     */
    public static function setAdminToken($admin_id, $token)
    {
        $flag = AdminModel::selectAdminToken($admin_id);
        if (empty($flag)) {
            $flag = AdminModel::insertAdminToken($admin_id, $token);
        } else {
            $flag = AdminModel::updateAdminToken($admin_id, $token);
        }
        return $flag;
    }

    /**
     * 获取新token
     *
     * @return void
     */
	public static function tokenGet() {
		return hash('sha256', md5(time() . config('common.salt')));
	}

}
