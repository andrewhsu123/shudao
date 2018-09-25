<?php
namespace app\v1\controller;

use app\common\controller\BaseController;

class WeiXin extends BaseController {

    private $appid = "wx677de14743811b48";
    private $appsecert = "561075bb55c94aa171b2c7001d4b735f";
    private $redirect_uri = "http://192.168.0.122/";

    // private $appid = "wx041114c91cc5ec23";
    // private $appsecert = "0bff6c0b7e318100b7dcb474c6fa28a2";
    // private $redirect_uri = "http://192.168.0.122/";

    public function index() {
        
    }

    public function wxLogin(){
        $appid = $this->appid;
        $redirect_uri = urlencode($this->redirect_uri);
        $scope = "snsapi_login";
        $state = "wxLogin";
        $url = "https://open.weixin.qq.com/connect/qrconnect?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=".$scope."&state=".$state."#wechat_redirect";
        return redirect($url);
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