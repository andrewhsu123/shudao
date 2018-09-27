<?php
namespace app\actor\model;

use think\Model;
use think\Db;
use app\common;
class ActorModel extends Model {
    
    // 获取地区列表
    public static function getActorList($ids){
        $field = "id,name,job,img";
        $info = db('Actor')->field($field)->where('id','in',$ids)->select();
        return $info;
    }
}