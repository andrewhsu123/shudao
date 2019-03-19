<?php
namespace app\v1\controller;

class WeiXin{

    private $appid = "wx5599fb739f660ecd";
    private $appsecret = "3ff5099d2c1bd9fea946547b7fd5318a";
    private $redirect_uri = "http://shudaoo.com/v1/login/login";
    
    /**
     * 登陆入口 
     * @return code 登陆需要的参数 code
     * @return url 自动跳转到登陆获取信息接口
     */
    public function sendWxLoginInfo()
    {
        $appid = $this->appid;
        $redirect_uri = urlencode($this->redirect_uri);
        $scope = "snsapi_userinfo";
        $state = "wxLogin";
        $url   = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . $redirect_uri . "&response_type=code&scope=" . $scope . "&state=" . $state . "#wechat_redirect";
        return redirect($url);
    }

    /**
     * 登陆获取用户信息接口
     * @return array $userInfo 用户信息
     */
    public function getWxLoginInfo()
    {
        $oauth2_info = $this->oauth2_access_token($_GET["code"]);
        if (!empty($oauth2_info)) {
            $userInfo = $this->oauth2_get_user_info($oauth2_info['access_token'], $oauth2_info['openid']);
        } else {
            return [];
        }
        return $userInfo;
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

    /**
     * 生成微信菜单页面
     * @return void
     */
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

    /**
     * 验证服务器 【作废】
     * @return void
     */
    public function test()
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
        } else {
            echo "对比错误";
        }   
    }
    
    /**
     * 验证服务器 【作废】
     * @return void
     */
    public function checkSignature($signature, $nonce, $timestamp)
    {
        $token = 'weixin';
        //把这三个参数存到一个数组里面
        $tmpArr = array($timestamp, $nonce, $token);
        //进行字典排序
        $tmpArr = sort($tmpArr);
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