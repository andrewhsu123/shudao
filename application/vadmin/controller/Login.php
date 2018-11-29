<?php
namespace app\vadmin\controller;
use app\vadmin\controller\BaseController;
use app\admin\model\AdminModel;

class Login extends BaseController {
    
    public function login(){
        $account  = input('account');
        $password = input('password');
        $token    = AdminModel::getAdminToken($account, $password);
        $return   = array('code'=>'200', 'data'=>$token);
        $this->ajaxReturn($return);
    }
}