<?php
namespace app\v1\controller;
use app\common\controller\BaseController;
use app\area\model\AreaModel;

class Area extends BaseController {

	/**
	 * @api {get} http://shudaoo.com/v1/area/index
	 * @apiName  index
	 * @apiGroup 地区列表
	 * @apiParam (params) {sting} token 用户唯一标识符
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 * 
	 * 
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
		$areaInfo 	= AreaModel::getArea();
		$msg 		= "地区列表";
        $return 	= array('code'=>'200', 'msg'=>$msg, 'data'=>$areaInfo);
        $this->ajaxReturn($return);
	}


	/**
	 * @api {get} http://shudaoo.com/v1/area/setArea
	 * @apiName  setArea
	 * @apiGroup 设置地区
	 * @apiParam (params) {sting} token 用户唯一标识符 
	 * 
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 *
	 * @apiSuccessExample Success-Response:
	 *    HTTP/1.1 200 OK
	 *      {
	 *        "msg": "返回消息",
	 *        "code": "错误编码",
	 *       }
	 * @apiError (Error 404) 404 数据错误
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 数据错误
	 *     {
	 *       "error": err
	 *     }
	 */
	public function setArea(){
		$user_id = UID;
		$area_id = input('area_id');
		$return  = AreaModel::setArea($user_id,$area_id);
        $this->ajaxReturn($return);
	}
}