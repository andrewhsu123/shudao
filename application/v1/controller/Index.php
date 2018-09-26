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
	 * @apiParam (params) {int} page 当前页数
	 * @apiParam (params) {int} pagesize 每页记录数
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
	 *        "hotFilm": "---正在热播---",
	 *        "id": "影片编号",
	 *        "name": "影片名称",
	 *        "introduction": "影片一句话简介",
	 *        "img": "影片图片",
	 *        "score": "影片评分",
	 *        "showFilm": "---即将上映---",
	 *        "id": "影片编号",
	 *        "name": "影片名称",
	 *        "see_num": "想看人数",
	 *        "filmList": "---全部影片---",
	 *        "movie_type": "120分钟  犯罪、剧情、冒险",
	 *        "actor": "主演",
	 *        "video_type": "2D,3D,IMAX,MX4D,中国巨幕",
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
		$page 		= input('page','1');
		$pagesize 	= input('pagesize','10');
		$cinema_id 	= input('cinema_id');

		$banner  	= BannerModel::getBanner($cinema_id);
		$hotFilm  	= FilmModel::getFilmList($cinema_id,1,$page,$pagesize);
		$showFilm  	= FilmModel::getFilmList($cinema_id,2,$page,$pagesize);
		$filmList  	= FilmModel::getFilmList($cinema_id,3,$page,$pagesize);

		$lists 		= compact('banner','hotFilm','showFilm','filmList');
        $return 	= array('code'=>'200', 'msg'=>"首页", 'data'=>$lists);
        $this->ajaxReturn($return);
	}
}