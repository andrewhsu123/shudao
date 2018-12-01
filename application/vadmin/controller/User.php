<?php
namespace app\vadmin\controller;
use app\vadmin\controller\BaseController;
use app\user\action\UserAction;

class User extends BaseController {
    
    public function getUserTotal()
    {
        $token = input('token');
        try {
            $total = UserAction::getUserTotal();
            $return = array('code'=>'0', 'msg'=>'', 'data'=>$total);
            $this->ajaxReturn($return);
        } catch (\Throwable $e) {
            $return   = array('code'=>'200', 'msg'=>$e->getMessage());
            $this->ajaxReturn($return);
        }
    }

    public function getUserList()
    {

    }
}