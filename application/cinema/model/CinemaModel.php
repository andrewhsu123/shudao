<?php
namespace app\cinema\model;

use think\Model;
use think\Db;
use app\common;
use app\area\model\AreaModel;
class CinemaModel extends Model {
    
    // 获取地区影院列表
    public static function getCinemaList($area_id){
        $field = "id,name,address,phone";
        $info  = db('cinema')->field($field)->where('area_id',$area_id)->order('sort desc')->select();
        foreach ($info as $k => $v) {
        	$address = AreaModel::getAddress($area_id);
        	$info[$k]['address'] = $address.$v['address'];
        }
        $area_name = db('Area')->where('id',$area_id)->value('name');
        $return = array('lists'=>$info,'area_name'=>$area_name);
        return $info;
    }

    // 设置影院
    public static function setCinema($user_id,$cinema_id){
        $data    = array('cinema_id'=>$cinema_id);
        $flag    = db('User')->where('id',$user_id)->data($data)->update();
        $result  = array('code'=>"200", 'msg'=>"设置影院成功");
        return $result;
    }
}