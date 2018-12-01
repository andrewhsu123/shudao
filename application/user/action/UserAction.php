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
    public static function getUserTotal(){
        $count = UserModel::getUserTotal();
        return $count;
    }

}
