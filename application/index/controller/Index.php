<?php
namespace app\index\controller;
use app\common\controller\BaseController;

class Index extends BaseController {

    public function index()
    {	
        // 微信加密签名，signature结合了开发者填写的token参数和请求中的timestamp参数、nonce参数。
        $signature  = input('signature');
        // 随机数
        $nonce      = input('nonce');
        // 时间戳
        $timestamp  = input('timestamp');
        // 随机字符串
        $echostr    = input('echostr');

        if ($this->checkSignature($signature, $nonce, $timestamp)) {
            if ($echostr) {
                echo $echostr;
                exit;
            }
        }
    }

    public function checkSignature($signature, $nonce, $timestamp)
    {
        //把这三个参数存到一个数组里面
        $tmpArr = array($timestamp, $nonce, 'shudaoowangluo');
        //进行字典排序
        $tmpArr = sort($tmpArr, SORT_STRING);
        //把数组中的元素合并成字符串，impode()函数是用来将一个数组合并成字符串的
        $tmpStr = implode($tmpArr);
        //sha1加密，调用sha1函数
        $tmpStr = sha1($tmpStr);
        //判断加密后的字符串是否和signature相等
        if ($tmpStr == $signature) {
            return true;
        }
        return false;
    }
}
