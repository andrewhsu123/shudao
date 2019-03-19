<?php
namespace app\v1\controller;
use think\Db;
use app\common\controller\BaseController;
use app\user\model\UserModel;
use app\v1\controller\WeiXin;

class Login extends BaseController
{

    public function login()
    {
        $WeiXin = new WeiXin();
        $userinfo = $WeiXin->getWxLoginInfo();
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

}
