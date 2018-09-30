<?php
namespace app\v1\controller;
use app\common\controller\BaseController;
use app\film\model\FilmTimeModel;
use app\film\model\FilmModel;
use app\cinema\model\CinemaModel;

class FilmTime extends BaseController {
	/**
	 * @api {get} http://shudaoo.com/v1/film_time/index
	 * @apiName  index
	 * @apiGroup 场次列表
	 * @apiParam (params) {sting} token 用户唯一标识符[目前默认123456]
	 * @apiParam (params) {int} film_id   电影编号
	 * @apiParam (params) {int} cinema_id 影院编号
	 * @apiSuccess {int} code 200
	 * @apiSuccess {String} msg  接口访问成功
	 * @apiSuccess {Array} data []
	 * @apiSuccessExample Success-Response:
	 *    HTTP/1.1 200 OK
	 *      {
	 *         "code": "200",
	 *		   "msg": "场次列表",
	 *		   "data": {
	 *		   
	 *				"filmList": [  -- 电影列表
	 *				{
	 *					"id": 1, 电影编号
	 *					"name": "电影名称",
	 *					"introduction": "简介",
	 *					"img": "电影主图",
	 *					"score": 排序,
	 *					"movie_type": "120分钟  剧情、悬疑",
	 *					"actor": "主演",
	 *					"video_type": "2D,3D,IMAX,MX4D"
	 *				},
	 *			    "timeList": [  -- 场次列表
	 *			      	{
	 *				        "time_fmt": "09月30日", -- 场次时间
	 *				        "time_week": "周日",    -- 场次时间
	 *				        "lists": [
	 *							{
	 *								"id": 1,	       			  -- 场次编号
	 *								"h": 10,           			  -- 场次小时
	 *								"i": 0,            			  -- 场次分钟
	 *								"price": "33.00",  			  -- 该场次价格
	 *								"hall_id": 1,      			  -- 影厅编号
	 *								"type": "3D英语",     		  -- 电影类型
	 *								"hall_name": "1号厅"  		  -- 影厅名称
	 *							}
	 *					}
	 *		    	],
	 *		    	"address": {
	 *					"id": 1,   -- 地址编号
	 *					"name": "影院名称",
	 *					"address": "影院地址",
	 *					"area_id": 所属地区编号,
	 *					"phone": "17759462410",
	 *					"sort": 0
	 *				}
	 *		  	}
	 *      }
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
		$film_id  	= input('film_id',1);
		$cinema_id  = input('cinema_id',1);

		$filmList   = FilmModel::getFilmList($cinema_id,3,1,20);
		$address    = CinemaModel::getCinema($cinema_id);
		if(empty($film_id)){
        	$return = array('code'=>'400', 'msg'=>"影片编号错误");
        	$this->ajaxReturn($return);
		}
		$timeList	= array();
		$dateList   = FilmTimeModel::getdate();
		foreach($dateList as $k => $v){
			$v['lists']   = FilmTimeModel::getFilmTime($film_id,$v['y'],$v['m'],$v['d']);
			unset($v['y'],$v['m'],$v['d'],$v['h'],$v['i']);
			$timeList[] = $v;
		}

		$lists 		= compact('filmList','timeList','address');
        $return 	= array('code'=>'200', 'msg'=>"场次列表", 'data'=>$lists);
        $this->ajaxReturn($return);
	}

}