<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\common\model;

use think\Model;

class UserTokenModel extends Model {

	public static function api_find($user_id, $type = '1') {
		$database = db('tokenUser');
		$where = [
			'user_id' => $user_id,
			'type' => $type,
		];
		$database->where($where);
		$dat = $database->find();
		return $dat;
	}

	public static function __check_exists($user_id, $type = '1') {
		$database = db('tokenUser');
		$where = [
			'user_id' => $user_id,
			'type' => $type,
		];
		$database->where($where);
		if ($database->count(0) > '0') {
			return true;
		}
	}

	public static function api_verify_token($user_id, $token) {
		$database = db('tokenUser');
		$where = [
			'user_id' => $user_id,
			'token' => $token,
		];
		$database->where($where);
		if ($database->count(0) > '0') {
			return true;
		} else {
			self::api_cache_clear($user_id);
		}
	}

	public static function api_insert($user_id, $token, $type = '1', $dt = null) {
		$database = db('tokenUser');
		$data = [
			'user_id' => $user_id,
			'token' => $token,
			'type' => $type,
			'dt' => $dt,
		];
		$database->data($data);
		self::api_cache_clear($user_id);
		return $database->insert();
	}

	public static function api_delete($user_id, $type = null) {
		$database = db('tokenUser');
		$data['user_id'] = $user_id;
		if ($type) {
			$data['type'] = $type;
		}
		$database->data($data);
		self::api_cache_clear($user_id);
		return $database->delete();
	}

	public static function api_cache_clear($user_id) {

	}

}
