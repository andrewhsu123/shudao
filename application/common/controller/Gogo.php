<?php

namespace app\common\controller;

use think\Controller;

header('Access-Control-Allow-Origin:*');
class Gogo extends Controller {

    public static function advert(){
        $datas      = array();
        $where      = array('is_push'=>0);
        $data       = db('Notice')->field("id,title,content,is_cn")->where($where)->select();

        // foreach ($data as $k => $v) {
        //     if($v['title']){
        //         $datas[] = $v['title'].':'.$v['content'];
        //     }else{
        //         $datas[] = $v['content'];
        //     }
        // }

        $pushData = array('status'=>'4808','msg'=>'Advert','data'=>$data);
        if(!empty($data)){
            self::pushData ($pushData);
            foreach ($data as $k => $v) {
                db('Notice')->where(array('id'=>$v['id']))->data(array('is_push'=>'1','push_time'=>time()))->update();
            }
        }
    }

    /**
     * 针对用户推送
     * @param      <type>  $uid    用户编号
     * @param      <type>  $datas  要推送的数组
     */
    public static function recharge($uid,$datas){
        $pushData = array('status'=>'4001','uid'=>$uid,'msg'=>'Recharge','data'=>$datas);
        self::pushData ($pushData);
    }
    //新邮件推送
    public static function hasNewMsg($uid=0){
        $pushData = array('status'=>'4100','uid'=>$uid,'msg'=>'Postal','data'=>['has_new_msg'=>true]);
        self::pushData ($pushData);
    }
    //是否有邀请奖励可领取
    public static function hasNewAward($uid){
        $pushData = array('status'=>'4200','uid'=>$uid,'msg'=>'Award','data'=>['has_new_award'=>true]);
        self::pushData ($pushData);
    }
    //是否有邀请奖励可领取
    public static function hasNewHatch($uid){
        $pushData = array('status'=>'4300','uid'=>$uid,'msg'=>'Hatch','data'=>['has_new_hatch'=>true]);
        self::pushData ($pushData);
    }
    
    public static function pushData($opt = array()){
        $client = stream_socket_client (config('config.worekerin'), $errno, $errmsg, 1 );
        fwrite ( $client, json_encode ( $opt ) . "\n" );
    }
}