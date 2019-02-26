<?php

namespace app\common\controller;

use think\Request;
use think\Db;
use think\Lang;

header('Access-Control-Allow-Origin:*');
class BaseController {

    public $uid;
    public $userInfo;

    //不需要TOKEN校验地址
    private static $allowUrl = [
        '',
        'v1/login/index',
        'v1/login/login',
    ];

    public function __construct(Request $request) {
        $this->detectLang();
        // 获取当前访问的路径   ltrim => 移除左侧空白
        $baseUrl = ltrim($request->baseUrl(), '/');
        // 如果访问路径不在数组里则验证 token
        if(!in_array($baseUrl, self::$allowUrl)) {
            $token = request()->header('token');
            $this->_validate($token);
        }
    }

    /**
     * 探测并载入语言包
     */
    protected function detectLang() {
        //语言切换
        $lang = input('lang') ?: 'zh';
        $langArr = config('config.lang');
        // 检查键名是否存在
        if($lang && array_key_exists($lang, $langArr)) {
            Lang::range($langArr[$lang]);
            Lang::load(APP_PATH . 'lang/' . $langArr[$lang] . '.php');
        }
    }
    
    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param  mixed $data 要返回的数据
     * @param  String $type AJAX返回数据格式
     * @param  int $json_option 传递给json_encode的option参数
     * @author <382272420@qq.com>   2018-06-13
     */
    public function ajaxReturn($data,$type='',$json_option=0) {
        switch ($type){
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);            
            default     :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data,$json_option));
        }
    }

    private function _validate($token){
        
        if (empty($token)) {
        	$return = array('code'=>10001, 'msg'=>"请先登录账号");
        	$this->ajaxReturn($return);
        }
        $user_id = db('tokenUser')->where('token', $token)->value('user_id');
        if (empty($user_id)) {
        	$return = array('code'=>10002, 'msg'=>"登陆过期请重新登陆");
        	$this->ajaxReturn($return);
        }
        $user = db('user')
            ->where('status', 1)
            ->where('id', $user_id)
            ->find();
        if (empty($user)) {
        	$return = array('code'=>10003, 'msg'=>"用户已被禁用，请联系管理员");
        	$this->ajaxReturn($return);
        }
        $this->uid = $user_id;
        $this->userInfo = $user;
    }

}
