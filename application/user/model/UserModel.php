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
}