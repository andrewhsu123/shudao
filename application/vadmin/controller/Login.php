<?php
namespace app\vadmin\controller;
use app\vadmin\controller\BaseController;
use app\admin\action\AdminLoginAction;

class Login extends BaseController {
    
    public function login(){
        $account  = input('account');
        $password = input('password');
        try {
            $data['token'] = AdminLoginAction::getAdminToken($account, $password);
            $return = array('code'=>'0', 'data'=>$data);
            $this->ajaxReturn($return);
        } catch (\Throwable $e) {
            $return   = array('code'=>'200', 'msg'=>$e->getMessage());
            $this->ajaxReturn($return);
        }
    }
}