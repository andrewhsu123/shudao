<?php
namespace app\index\controller;
use app\common\controller\BaseController;

class Index extends BaseController {
    public function index()
    {
        header("location:http://shudaoo.com/v1/wei_xin/sendWxLoginInfo");
    }
}