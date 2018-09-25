<?php
namespace app\banner\model;

use think\Model;
use think\Db;
use app\common;
class BannerModel extends Model {
    
    // 获取轮播图列表
    public static function getBanner($cinema_id){
        $field = "name,url,img";
        if(!empty($cinema_id)){
            $where = "cinema_id=".$cinema_id." or cinema_id=0";
        }else{
            $where = array();
        }
        $info  = db('Banner')->field($field)->where($where)->order('sort desc')->select();
        return $info;
    }

}