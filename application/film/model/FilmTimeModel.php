<?php
namespace app\film\model;

use think\Model;
use think\Db;
use app\common;

class FilmTimeModel extends Model {
    
    /**
     * 获取影院影片列表
     * @param      <type>  $cinema_id  影院编号
     * @param      <type>  $type       1:正在热映  2:即将上映  3:全部影片
     * @param      <type>  $page       当前页数
     * @param      <type>  $pagesize   每页记录数
     * @return     <type>  The film list.
     */
    public static function getFilmTime($film_id,$y,$m,$d){
        $field = "id,h,i,price,hall_id,type";
        $where = array('y'=>$y,'m'=>$m,'d'=>$d,'film_id'=>$film_id);
        $info  = db('FilmTime')->field($field)->where($where)->select();
        foreach($info as $k=>$v){
            $info[$k]['hall_name'] = db('Hall')->where('id',$v['hall_id'])->value('name');
        }
        return $info;
    }





    /**
     * 获取日期
     * @param      <type>  $time   当前日期
     * @return     星期
     */
    public static function getDate(){
        $time = array();
        $weekarray = array("日","一","二","三","四","五","六");
        for($i=0;$i<4;$i++){
            $time[$i]['time_fmt']  = date("m月d日",strtotime($i." day"));
            $time[$i]['time_week'] = "周".$weekarray[ date("w",strtotime($i." day"))];
            $time[$i]['y'] = date("Y",strtotime($i." day"));
            $time[$i]['m'] = date("m",strtotime($i." day"));
            $time[$i]['d'] = date("d",strtotime($i." day"));
            $time[$i]['h'] = date("H",strtotime($i." day"));
            $time[$i]['i'] = date("i",strtotime($i." day"));
        }
        return $time;
    }
}