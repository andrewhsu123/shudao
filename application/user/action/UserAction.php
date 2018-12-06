<?php

namespace app\user\action;

use think\Model;
use think\Db;

use app\user\model\UserModel;

class UserAction {

    /**
     * 获取用户数量
     * @return void
     */
    public static function getUserTotal()
    {
        $count = UserModel::getUserTotal();
        return $count;
    }

    public static function getUserList($page, $size, $where=[])
    {
		$field      = 'id,nickname,phone,area_id,cinema_id,address,account,sex,status,create_time';
        $model      = db('User')->field($field)->where($where)->page($page)->limit($size);
		$count      = $model->count();
        $lists   	= $model->select();

        $totalPage  = ceil($count/$size);

        $result     = array('list'=>$lists, 'totalPage'=>(int) $totalPage, 'page'=>(int) $page, 'size'=>(int) $size);
        return $result;
    }

}
