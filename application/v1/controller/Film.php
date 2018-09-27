<?php
namespace app\v1\controller;
use app\common\controller\BaseController;
use app\film\model\FilmModel;

class Film extends BaseController {
	/**
	 * @api {get} http://shudaoo.com/v1/film/index
	 * @apiName  index
	 * @apiGroup 影片详情
	 * @apiParam (params) {sting} token 用户唯一标识符[目前默认123456]
	 * @apiParam (params) {int} id 影片编号
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 * @apiSuccessExample Success-Response:
	 *    HTTP/1.1 200 OK
	 *      {
	 *         "code": "200",
			   "msg": "影片详情",
			   "data": {
			    "id": 1,
			    "name": "影片名称",
			    "img":  "影片图片",
			    "score":  "评分",
			    "release_time": "上映时间",
			    "video_type": "2D,3D,IMAX,MX4D,中国巨幕",
			    "movie_type": "120分钟  犯罪、剧情、冒险",
			    "detail": "简介详细",
			    "actor": [
			      {
			        "id": "演员编号",
			        "name": "演员名称",
			        "job": "饰演/角色",
			        "img": "演员图片"
			      }
			    ],
			    "still": [
			      {
			        "img": "剧照图片"
			      },
			      {
			        "img": "gw.alicdn.com\/tfscom\/TB2uy8tbMHqK1RjSZJnXXbNLpXa_!!6000000004180-0-tbvideo.jpg_q30.jpg"
			      }
			    ]
			  }
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
		$id 		= input('id');
		$info   	= FilmModel::getFilm($id,UID);
        $return 	= array('code'=>'200', 'msg'=>"影片详情", 'data'=>$info);
        $this->ajaxReturn($return);
	}
}