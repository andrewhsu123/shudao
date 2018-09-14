<?php
namespace app\index\controller;
use app\common\controller\BaseController;

class Index extends BaseController {

    public function index()
    {	
		header("location:http://shudaoo.com/doc/index.html");
    }

    public function shudao()
    {	
		header("location:http://shudaoo.com/doc_api/index.html");
    }
}