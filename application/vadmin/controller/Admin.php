<?php
namespace app\vadmin\controller;
use app\vadmin\controller\BaseController;
use app\admin\action\AdminLoginAction;

class Admin extends BaseController {
    
    public function adminInfo(){
        $token = input('token');
        try {
            $data = AdminLoginAction::getAdminInfo($token);
            $return = array('code'=>'0', 'msg'=>'', 'data'=>$data);
            $this->ajaxReturn($return);
        } catch (\Throwable $e) {
            $return   = array('code'=>'200', 'msg'=>$e->getMessage());
            $this->ajaxReturn($return);
        }
    }
}