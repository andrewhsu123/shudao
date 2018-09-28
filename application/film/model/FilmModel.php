<?php
namespace app\film\model;

use think\Model;
use think\Db;
use app\common;
use app\actor\model\ActorModel;

class FilmModel extends Model {
    
    /**
     * 获取影院影片列表
     * @param      <type>  $cinema_id  影院编号
     * @param      <type>  $type       1:正在热映  2:即将上映  3:全部影片
     * @param      <type>  $page       当前页数
     * @param      <type>  $pagesize   每页记录数
     * @return     <type>  The film list.
     */
    public static function getFilmList($cinema_id,$type,$page,$pagesize){
    	if($type==1){
        	$field = "id,name,introduction,img,score";
        	$where = array('cinema_id'=>$cinema_id,'is_hot'=>1,'status'=>1);
        	$info  = db('Film')->field($field)->where($where)->order('sort desc')->limit($pagesize)->page($page)->select();
    	}elseif($type==2){
        	$field = "id,name,img,see_num";
        	$where = array('cinema_id'=>$cinema_id,'is_show'=>1,'status'=>1);
        	$info  = db('Film')->field($field)->where($where)->where('release_time','gt',time())->order('sort desc')->limit($pagesize)->page($page)->select();
    	}else{
        	$field = "id,name,introduction,img,score,movie_type,actor,video_type";
        	$where = array('cinema_id'=>$cinema_id,'is_show'=>0,'status'=>1);
        	$info  = db('Film')->field($field)->where($where)->order('sort desc')->limit($pagesize)->page($page)->select();
    	}
        return $info;
    }

    /**
     * 获取影片详情
     * @param      <type>  $id     影片编号
     */
    public static function getFilm($id,$user_id){
        $field = "id,name,img,still_group,actor_ids,release_time,video_type,movie_type,detail,score";
        $info  = db('Film')->field($field)->where('id',$id)->find();
        $info['release_time'] = date('Y年m月d日',$info['release_time'])."上映";
        $info['actor']    = ActorModel::getActorList($info['actor_ids']);
        $info['still']    = db('Still')->field('img')->where('group',$info['still_group'])->select();
        $info['is_see']   = self::getLike($user_id,$info['still_group'],2);
        $info['is_like']  = self::getLike($user_id,$info['still_group'],1);
        unset($info['actor_ids'],$info['still_group']);
        return $info;
    }

    /**
     * 喜欢想看操作
     * @param      <type>  $film_id  The film identifier
     * @param      <type>  $type     The type
     * @param      <type>  $user_id  The user identifier
     * @return     <type>  ( description_of_the_return_value )
     */
    public static function likeFilm($film_id,$type,$user_id){
        $film_group = db('Film')->where('id',$film_id)->value('still_group');
        $where = array('user_id'=>$user_id,'film_group'=>$film_group,'type'=>$type);
        $count = db('Like')->where($where)->count();
        if($count>0){
            db('Like')->where($where)->delete();
        }else{
            db('Like')->data($where)->insert();
        }
        if($type == 1){
            $data['is_like']  = self::getLike($user_id,$film_group,1);
        }else{
            $data['is_see']   = self::getLike($user_id,$film_group,2);
        }
        return $data;
    }

    /**
     * 是否喜欢
     * @param      <type>  $user_id     用户编号
     * @param      <type>  $film_group  电影剧照组别
     * @param      <type>  $type        类型 1:想看 2:看过
     */
    public static function getLike($user_id,$film_group,$type){
        $where = array('user_id'=>$user_id,'film_group'=>$film_group,'type'=>$type);
        $count = db('Like')->where($where)->count();
        if($count>0){
            return 1;
        }else{
            return 0;
        }
    }

}