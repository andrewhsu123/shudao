<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\common\model;

use think\Model;

class UserModel extends Model {

	public static function api_find($uid) {
		$database = db('user');
		$where = [
			'id' => $uid
		];
		$database->where($where);
		$dat = $database->find();
		return $dat;
	}

	public static function api_find_byUsername($username) {
		$database = db('user');
		$where = [
			'username' => $username
		];
		$database->where($where);
		$dat = $database->find();
		return $dat;
	}

	public static function api_find_uid_byUsername($username) {
		$database = db('user');
		$where = [
			'username' => $username
		];
		$database->where($where);
		$database->field('id');
		$dat = $database->find()['id'];
		return $dat;
	}

	public static function api_update_ethAmount($uid, $eth_amount) {
		$database = db('user');
		$where = [
			'id' => $uid
		];
		$database->where($where);
		$database->inc('eth_amount', $eth_amount);
		if (abs($eth_amount) == '0') {
			return true;
		}
		return $database->update();
	}

}
