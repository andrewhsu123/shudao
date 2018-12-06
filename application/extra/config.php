<?php

use think\Env;

$env = Env::get('APP_ENV');
$envArr = include APP_PATH . "config/extra_{$env}.php";

$arr = [
    'password_secret' => 'cZJpBjd,E@bPMa3t!NDtA*,1Xq9XRnKT',  //加密秘钥
    'default_avatar' => 'default/default_avatar.png',         //默认图片
    'worekerin'     => 'tcp://127.0.0.1:8282',
    'worekerout'    => 'websocket://0.0.0.0:8181',
    'lang' => [
        'zh' => 'zh-cn',
        'en' => 'en-us'
    ],
    'page_num' => 10
];

return array_merge($arr, $envArr);