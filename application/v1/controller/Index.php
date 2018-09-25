<?php
namespace app\v1\controller;
use app\common\controller\BaseController;
use app\banner\model\BannerModel;
use app\film\model\FilmModel;

class Index extends BaseController {
	
	/**
	 * @api {get} http://shudaoo.com/v1/index/index
	 * @apiName  index
	 * @apiGroup 首页
	 * @apiParam (params) {sting} token 用户唯一标识符[目前默认123456]
	 * @apiParam (params) {int} cinema_id 影院编号
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 * @apiSuccessExample Success-Response:
	 *    HTTP/1.1 200 OK
	 *      {
	 *        "banner": "---轮播图---",
	 *        "name": "图片名称",
	 *        "url": "跳转链接",
	 *        "name": "图片地址",
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
		$cinema_id 	= input('cinema_id');
		$banner  	= BannerModel::getBanner($cinema_id);
		// $hotFilm  	= FilmModel::getFilmList($cinema_id,);

		$lists 		= compact('banner','hotFilm');
        $return 	= array('code'=>'200', 'msg'=>"首页", 'data'=>$lists);
        $this->ajaxReturn($return);
	}
}