<?php
namespace app\area\model;

use think\Model;
use think\Db;
use app\common;
class AreaModel extends Model {
    
    // 获取地区列表
    public static function getArea(){
        $field = "id,name";
        $cityInfo = db('Area')->field($field)->where('pid',0)->order('n asc')->select();
        foreach ($cityInfo as $k => $v) {
            $cityInfo[$k]['pcity'] = db('Area')->field($field)->where('pid',$v['id'])->order('n asc')->select();
        }
        return $cityInfo;
    }

    // 设置用户地区
    public static function setArea($user_id,$area_id){
        Db::startTrans();
        try{
            if(empty($area_id)){
                Db::rollback();
                $result = array('code'=>"0001", 'msg'=>"地区不为空");
            }
            $data   = array('area_id'=>$area_id); 
            $flag   = db('User')->where('id',$user_id)->data($data)->save();
            Db::commit();
            $result = array('code'=>"200", 'msg'=>"设置地区成功");
            return $result;
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            $result = array('code'=>"0002", 'msg'=>"设置地区失败");
            return $result;
        }
    }
    
}