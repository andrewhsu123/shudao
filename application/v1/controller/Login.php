<?php
namespace app\v1\controller;
use think\Db;
use app\common\controller\BaseController;
use app\user\model\UserModel;

class Login extends BaseController
{
    private $appid = "wx5599fb739f660ecd";
    private $appsecret = "3ff5099d2c1bd9fea946547b7fd5318a";
    private $redirect_uri = "http://shudaoo.com/v1/login/login";

    public function index()
    {
        $appid = $this->appid;
        $redirect_uri = urlencode($this->redirect_uri);
        $scope = "snsapi_userinfo";
        $state = "wxLogin";
        $url   = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . $redirect_uri . "&response_type=code&scope=" . $scope . "&state=" . $state . "#wechat_redirect";
        return redirect($url);
    }

    public function login()
    {
        $oauth2_info = $this->oauth2_access_token($_GET["code"]);
        if (!empty($oauth2_info)) {
            $userinfo = $this->oauth2_get_user_info($oauth2_info['access_token'], $oauth2_info['openid']);
        } else {
            echo "参数错误，请发消息给公众号，留言";
            exit;
        }
        try {
            Db::startTrans();
            $userId   = UserModel::checkRegist($userinfo['openid']);
            if ($userId) {
                $token = UserModel::getUserToken($userId);
                $data  = ['userId'=>$userId, 'token'=>$token];
            } else {
                $data  = UserModel::createUserToken($userinfo);
            }
            Db::commit();
            $return = ['code' => '0', 'msg' => "登陆成功", 'data' => $data];
            $this->ajaxReturn($return);
        } catch (\Exception $e) {
            Db::rollback();
            $this->ajaxReturn(['code'=>$e->getCode(), 'msg' => $e->getMessage()]);
        }
    }

    //生成OAuth2的Access Token
    public function oauth2_access_token($code)
    {
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$this->appid."&secret=".$this->appsecret."&code=".$code."&grant_type=authorization_code";
        $res = $this->http_request($url);
        return json_decode($res, true);
    }

    //获取用户基本信息（OAuth2 授权的 Access Token 获取 未关注用户，Access Token为临时获取）
    public function oauth2_get_user_info($access_token, $openid)
    {
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
        $res = $this->http_request($url);
        return json_decode($res, true);
    }

    //HTTP请求（支持HTTP/HTTPS，支持GET/POST）
    protected function http_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}
