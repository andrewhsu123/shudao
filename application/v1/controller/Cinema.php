<?php
namespace app\v1\controller;
use app\common\controller\BaseController;
use app\cinema\model\CinemaModel;

class Cinema extends BaseController {

	/**
	 * @api {get} http://shudaoo.com/v1/cinema/index
	 * @apiName  index
	 * @apiGroup 影院列表
	 * @apiParam (params) {sting} token 用户唯一标识符[目前默认123456]
	 * @apiParam (params) {int} area_id 地区编号
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 * @apiSuccessExample Success-Response:
	 *    HTTP/1.1 200 OK
	 *      {
	 *        "id": "影院编号",
	 *        "name": "影院名称",
	 *        "address": "影院地址",
	 *        "phone": "手机号",
	 *       }
	 * @apiError (Error 404) 404 数据错误
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 数据错误
	 *     {
	 *       "msg": 错误信息,
	 *       "code": 错误编号
	 *     }
	 */
	public function index(){
		$area_id    = input('area_id');
		if(empty($area_id)){
        	$return 	= array('code'=>'0003', 'msg'=>"地区编号不能为空");
        	$this->ajaxReturn($return);
		}
		$info 	 	= CinemaModel::getCinemaList($area_id);
		$msg 		= "影院列表";
        $return 	= array('code'=>'200', 'msg'=>$msg, 'data'=>$info);
        $this->ajaxReturn($return);
	}

	/**
	 * @api {get} http://shudaoo.com/v1/cinema/setCinema
	 * @apiName  setCinema
	 * @apiGroup 设置影院
	 * @apiParam (params) {sting} token 用户唯一标识符 
	 * @apiParam (params) {int} cinema_id 影院编号
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
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 404 数据错误
	 *     {
	 *       "error": err
	 *     }
	 */
	public function setCinema(){
		$user_id   = UID;
		$cinema_id = input('cinema_id');
		$return    = CinemaModel::setCinema($user_id,$cinema_id);
        $this->ajaxReturn($return);
	}
}