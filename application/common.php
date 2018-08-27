<?php
// 应用公共函数文件

use app\common\service\ChuanglanSMS;
use think\Lang;

/**
 * 发送短信
 * @author  zhw
 * @version 2018-01-18
 *
 * @param string $tel 手机号
 * @param string $msg 发送内容
 * @return mixed
 */
function sendSMS($tel = '', $msg = '') {
	$sms = new ChuanglanSMS('I4407260', 'gGs8ncAvEJdb2e');
	// 发送短信
	$result = $sms->sendInternational($tel, $msg);
	$arr = json_decode($result, true);
	return $arr;
}

/**
 * 加密
 * @param $pwd
 * @return string
 */
function password($pwd) {
	return md5(sha1($pwd) . config('config.password_secret'));
}

/**
 * 生成TOKEN
 * @return string
 */
function createToken() {
	try {
		$result = db()->query('select uuid() as uuid;');
		if ($result) {
			return md5($result[0]['uuid']);
		}
	} catch (\Exception $e) {

	}

	return '';
}

/**
 * 生成订单号
 * @return string
 */
function createOrderId() {
	$yearCode = [
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
		'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
	];

	$dayCode = [
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A',
		'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M',
		'N', 'O', 'P', 'Q', 'R', 'T', 'U', 'V', 'W', 'X', 'Y'
	];

	//一共16, '.', ''位订单号,同一秒内重复概率1/10000000,26年一次的循环
	$orderId = $yearCode[(intval(date('Y')) - 2018) % 26] . //年 1位
			strtoupper(dechex(date('m'))) . //月(16, '.', ''进制) 1位
			$dayCode[intval(date('d'))] . //日 1位
			substr(time(), -5) . substr(microtime(), 2, 5) . //秒5位 //微秒5位
			sprintf('%03d', rand(0, 999)); //随机数 3位

	return $orderId;
}

/**
 * 是否包含敏感词
 * @param $word
 * @return bool
 */
function isExistSensitiveWord($word) {
	$sensitiveWordArr = include APP_PATH . 'extra/sensitive_word.php';
	if ($sensitiveWordArr) {
		$pattern = '/' . implode('|', $sensitiveWordArr) . '/i';
		if (preg_match($pattern, $word)) {
			return true;
		}
	}

	return false;
}

function mul($int_num, $int_num2, $pad = 8) {
	return bcmul(number_format($int_num, 16, '.', ''), number_format($int_num2, 16, '.', ''), $pad);
}

function div($int_num, $int_num2, $pad = 8) {
	return bcdiv(number_format($int_num, 16, '.', ''), number_format($int_num2, 16, '.', ''), $pad);
}

function add($int_num, $int_num2, $pad = 8) {
	return bcadd(number_format($int_num, 16, '.', ''), number_format($int_num2, 16, '.', ''), $pad);
}

function sub($int_num, $int_num2, $pad = 8) {
	return bcsub(number_format($int_num, 16, '.', ''), number_format($int_num2, 16, '.', ''), $pad);
}

/**
 * 比较两个高精度数
 * @param $num1
 * @param $num2
 * @param string $sign
 * @param int $pad
 * @return bool
 */
function precisionComp($num1, $num2, $sign = '>', $pad = 8) {
    $strNum1 = number_format($num1, $pad, '.', '');
    $strNum2 = number_format($num2, $pad, '.', '');
    switch ($sign) {
        case '>' :
            return bccomp($strNum1, $strNum2, $pad) == 1;
        case '>=' :
            return bccomp($strNum1, $strNum2, $pad) == 1 || bccomp($strNum1, $strNum2, $pad) == 0;
        case '=' :
            return bccomp($strNum1, $strNum2, $pad) == 0;
        case '<' :
            return bccomp($strNum1, $strNum2, $pad) == -1;
        case '<=' :
            return bccomp($strNum1, $strNum2, $pad) == -1 || bccomp($strNum1, $strNum2, $pad) == 0;
        default :
            die('Invalid sign');
    }
}

/**
 * 高精度两个数相乘
 * @param $num1
 * @param $num2
 * @param int $decimals
 * @return string
 */
function precisionMul($num1, $num2, $decimals = 8) {
    return bcmul(number_format($num1, $decimals, '.', ''), number_format($num2, $decimals, '.', ''), $decimals);
}

/**
 * 高精度两个数相除
 * @param $num1
 * @param $num2
 * @param int $decimals
 * @return string
 */
function precisionDiv($num1, $num2, $decimals = 8) {
    return bcdiv(number_format($num1, $decimals, '.', ''), number_format($num2, $decimals, '.', ''), $decimals);
}

/**
 * 高精度两个数相加
 * @param $num1
 * @param $num2
 * @param int $decimals
 * @return string
 */
function precisionAdd($num1, $num2, $decimals = 8) {
    return bcadd(number_format($num1, $decimals, '.', ''), number_format($num2, $decimals, '.', ''), $decimals);
}

/**
 * 高精度两个数相减
 * @param $num1
 * @param $num2
 * @param int $decimals
 * @return string
 */
function precisionSub($num1, $num2, $decimals = 8) {
    return bcsub(number_format($num1, $decimals, '.', ''), number_format($num2, $decimals, '.', ''), $decimals);
}

/**
 * 数据库配置表多语言处理
 *
 * @param string $name 一个字段则为表名称；多个字段则表名 + "_" + 字段名
 * @param int $id 表ID
 * @param array  $vars 动态变量值
 * @param string $lang 语言 中文：zh 英文：en
 * @return string
 */
function tableLang($name, $id, $vars = [], $lang = '') {
    $key = $name . '_' . $id;
    if($lang) {
        Lang::range($lang);
        Lang::load(APP_PATH . 'lang/' . $lang . '.php');
    }
    $str = lang($key, $vars, $lang);

    return $str;
}

/**
 * CURL请求
 * @param $url string 请求地址
 * @param string $method 请求方式GET、POST
 * @param array $params 请求参数
 * @param array $options
 * @return mixed
 * @throws Exception
 */
function requestUrl($url, $params = [], $method = 'GET', $options = []) {
    $method = strtoupper($method);
    if ($method === 'GET') {
        $url .= (stripos($url, '?') ? '&' : '?') . http_build_query($params);
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);

    if (preg_match('/^(https:\/\/)/', $url)) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    }

    if ($method === 'POST') {
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    }

    if (isset($options['headers']) && count($options['headers'])) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, $options['headers']);
    }

    $result = curl_exec($curl);

    if ( curl_errno($curl) ) {
        throw new Exception(curl_error($curl), 1);
    }

    return $result;
}
