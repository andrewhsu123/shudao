<?php
namespace app\v1\controller;
use app\common\controller\BaseController;

class City extends BaseController {

	/**
	 * @api {get} http://shudaoo.com/v1/city/index
	 * @apiName  index
	 * @apiGroup 首页接口
	 * @apiParam (params) {sting} token 用户唯一标识符
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 *
	 * @apiSuccessExample Success-Response:
	 *    HTTP/1.1 200 OK
	 *      {
	 *        "id": "地区编号",
	 *        "name": "地区名称",
	 *        "pcity": "下级地区",
	 *       }
	 * @apiError (Error 404) 404 数据错误
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 数据错误
	 *     {
	 *       "error": err
	 *     }
	 */
	public function index(){
		$field = "id,name";
		$cityInfo = db('TabCity')->field($field)->where('pid',0)->order('n asc')->select();
		foreach ($cityInfo as $k => $v) {
			$cityInfo[$k]['pcity'] = db('TabCity')->field($field)->where('pid',$v['id'])->order('n asc')->select();
		}
		$msg = "地区列表";
        $return 	= array('code'=>'200', 'msg'=>$msg, 'data'=>$cityInfo);
        $this->ajaxReturn($return);
	}

	
}