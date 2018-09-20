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
            $address = self::getAddress($area_id);
            $data    = array('area_id'=>$area_id,'address'=>$address);
            $flag    = db('User')->where('id',$user_id)->data($data)->update();
            Db::commit();
            $result  = array('code'=>"200", 'msg'=>"设置地区成功");
            return $result;
        } catch (\Exception $e) {
            Db::rollback();
            $result = array('code'=>"0002", 'msg'=>"设置地区失败");
            return $result;
        }
    }

    // 获取地址
    public static function getAddress($id){
        $areaInfo = db('Area')->field('id,pid,name,level')->select();
        $areaInfo = self::getTreeDesc($areaInfo,$id);

        switch ($areaInfo['level']) {
            case '4':
                $address = $areaInfo['pcity']['pcity']['name'].$areaInfo['pcity']['name'].$areaInfo['name'];
                break;
            case '3':
                $address = $areaInfo['pcity']['name'].$areaInfo['name'];
                break;
            default:
                $address = $areaInfo['name'];
                break;
        }
        return (string) $address;
    }

    // 儿子找爸爸
    public static function getTreeDesc($data, $id){
        foreach($data as $k => $v){
           if($v['id'] == $id){
                if($v['pid']!=0){
                    $pcity = self::getTreeDesc($data, $v['pid']);
                    $v['pcity'] = $pcity;
                }
                $tree = $v;
           }
        }
        return $tree;
    }

    // 爸爸找儿子
    public static function getTreeAsc($data, $pid){
        foreach($data as $k => $v){
           if($v['pid'] == $pid){
                $v['pid'] = self::getTreeAsc($data, $v['id']);
                $tree[] = $v;
           }
        }
        return $tree;
    }

}