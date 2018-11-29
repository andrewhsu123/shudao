<?php
namespace app\vadmin\controller;

use think\Request;
use think\Db;
use think\Lang;

header('Access-Control-Allow-Origin:*');
class BaseController {

    //不需要TOKEN校验地址
    private static $allowUrl = [
        '',
        'vadmin/login/login',
    ];

    public function __construct(Request $request) {
        $this->detectLang();
        $baseUrl = ltrim($request->baseUrl(), '/');
        if(!in_array($baseUrl, self::$allowUrl)) {
            $header = getallheaders();
            if(empty($header['Authorization'])){
                exit($this->error(lang('invalid_token'), 401)->send());
            }
            $token = $header['Authorization'];
            // 没有找到用户
            $admin_id = db('tokenAdmin')->where('token', $token)->value('admin_id');
            if(empty($admin_id)) {
                exit($this->error(lang('invalid_token'), 402)->send());
            }
            define('ADMIN_ID', $admin_id);
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

}
