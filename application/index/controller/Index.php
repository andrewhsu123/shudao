<?php
namespace app\index\controller;
use app\common\controller\BaseController;

class Index extends BaseController {

    public function index()
    {	
    	$url = 'http://' . $_SERVER['HTTP_HOST'] ;
		header("location:".$url."/doc/index.html");
    }
}