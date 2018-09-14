<?php

namespace app\common\controller;

use think\Request;
use think\Db;
use think\Lang;

class BaseController {

    //不需要TOKEN校验地址
    private static $allowUrl = [
        '',
        // 'v1/index/indexf',
        // 'v1/account/changePwd',
        // 'v1/account/reg',
        // 'v1/sms/send',
        // 'v1/charge/addressImg',
        // 'v1/charge/notify',
        // 'v1/charge/takeMsgNofify',
        // 'v1/charge/balanceChange',
        // 'v1/hatch/distribution',
        // 'v1/config',
        // 'v1/transfer/notify',
    ];

    public function __construct(Request $request) {
        // 
        $this->detectLang();
        // 获取当前访问的路径   ltrim => 移除左侧空白
        $baseUrl = ltrim($request->baseUrl(), '/');
        // 如果访问路径不在数组里则验证 token
        // if(!in_array($baseUrl, self::$allowUrl)) {
        if(0) {
            // 获取登录 token
            $token = input('token');
            // 没有提交token
            if(empty($token)) {
                exit($this->error(lang('invalid_token'), 401)->send());
            }
            // 没有找到用户
            $user_id = db('UserToken')->where('token', $token)->value('user_id');
            if(empty($user_id)) {
                exit($this->error(lang('invalid_token'), 402)->send());
            }

            $user = Db::table('user')->field('status,rolename')->where('id', $userToken['user_id'])->find();
            if(empty($user)) {
                exit($this->error(lang('invalid_token'), 20000)->send());
            }
            //判断封号
            if($user['status'] == 1) {
                exit($this->error(lang('account_disabled'), 20100)->send());
            }

            define('UID', $userToken['user_id']);
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
     * 错误
     * @param $msg
     * @param int $code
     * @param array $option
     * @return \think\response\Json
     */
    protected function error($msg, $code = 99999, $option = []) {
        $result = [
            'code' => $code,
            'msg' => $msg
        ];
        if($option) {
            $result += $option;
        }

        return json($result);
    }

    /**
     * 成功
     * @param string $msg
     * @param array $data
     * @return \think\response\Json
     */
    protected function success($msg = '', $data = []) {
        $result = [
            'code' => 0,
            'msg' => $msg,
            'data' => $data
        ];

        return json($result);
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
