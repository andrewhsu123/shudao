<?php
namespace app\v1\controller;

use app\common\controller\BaseController;

class WeiXin extends BaseController {

    private $appid = "wx5599fb739f660ecd";
    private $appsecert = "3ff5099d2c1bd9fea946547b7fd5318a";
    private $redirect_uri = "http://shudaoo.com";

    public function wxLogin(){
        $appid = $this->appid;
        $redirect_uri = urlencode($this->redirect_uri);
        $scope = "snsapi_userinfo";
        $state = "wxLogin";
        $url   = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=".$scope."&state=".$state."#wechat_redirect";
        return redirect($url);
    }
    
    public function createMenu(){
        $ACCESS_TOKEN = input('access_token');
        $data = '{
            "button":[
                {
                    "name":"示例程序",
                    "sub_button":[
                        {    
                            "type":"view",
                            "name":"蜀道电影",
                            "url":"http://shudaoo.com/"
                        },
                        {
                            "type":"click",
                            "name":"赞一下我们",
                            "key":"1"
                        }
                    ]
                },
                {    
                    "type":"view",
                    "name":"关于我们",
                    "url":"http://www.shudaoo.com/"
                }
            ]
        }';
        $ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$ACCESS_TOKEN}");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Errno'.curl_error($ch);
        }
        curl_close($ch);
        var_dump($tmpInfo);
 
    }

    // public function weixin(Request $req){
    //     $appid="";     //在开放平台创建应用后获取的
    //     $appkey="";  //应用签名
    //     $code=$req->code;//触发微信登录请求接口后返回的code参数
    //     $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appkey.'&code='.$code.'&grant_type=authorization_code';

    //     $data=file_get_contents($url);
    //     $data=json_decode($data);

    //     $access_token=$data->access_token;
    //     $openid=$data->openid;


    //     $url1='https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid;
    //     $call=file_get_contents($url1);
    //     $call=json_decode($call);
    //     //openid存在，直接登录，openid不存在，先注册再登录
    //     $user=User::where(['type'=>User::USER_TYPE_WEIXIN, 'openid'=>$call->unionid])->first();

    //     if ($user) {//当用户存在时直接登录
    //         self::homeLogin($user->id,$user->name);return redirect('/user/index');
    //     }
    //     //获取从微信获取的用户信息
    //     $name=$call->nickname;
    //     $img=$call->headimgurl;
    //     $sex=$call->sex;
    //     $openid=$call->openid;
    //     $unionid = $call->unionid;
    //     $id=User::insertGetId(array(
    //         'name'=>$name,
    //         'nickname'=>$name,
    //         'type'=>User::USER_TYPE_WEIXIN,
    //         'openid'=>$unionid,
    //         'img'=>$img,
    //     ));

    //     self::homeLogin($id,$name);
    //     return redirect('/user/index');
    // }

}