<?php
namespace app\area\model;

use think\Model;
use think\Db;
use app\common;
class AreaModel extends Model {
    
    public static function getArea(){
        $field = "id,name";
        $cityInfo = db('Area')->field($field)->where('pid',0)->order('n asc')->select();
        foreach ($cityInfo as $k => $v) {
            $cityInfo[$k]['pcity'] = db('Area')->field($field)->where('pid',$v['id'])->order('n asc')->select();
        }
        return $cityInfo;
    }
}





//验证通过
// Db::startTrans();
// try{
//     Db::commit();
//     $result = array('code'=>"0", 'msg'=>"购买成功");
//     return $result;

// } catch (\Exception $e) {
//     // 回滚事务
//     Db::rollback();
//     $result = array('code'=>"0002", 'msg'=>"购买失败，该商品已被其他玩家购买。");
//     return $result;
// }