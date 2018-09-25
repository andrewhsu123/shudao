<?php
namespace app\film\model;

use think\Model;
use think\Db;
use app\common;
class FilmModel extends Model {
    
    // 获取地区影院列表
    public static function getFilmList($cinema_id,$type){
    	
        $field = "id,name";
        $cityInfo = db('film')->field($field)->where('pid',0)->order('n asc')->select();
        foreach ($cityInfo as $k => $v) {
            $cityInfo[$k]['pcity'] = db('Area')->field($field)->where('pid',$v['id'])->order('n asc')->select();
        }
        return $cityInfo;
    }
}