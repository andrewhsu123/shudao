<?php
use think\Lang;

Lang::load(APP_PATH . 'lang/en-us/user.php');

return [
	'mobile_format_wrong' => 'Mobile format is wrong',
	'mobile_exist' => 'Mobile number not exist',
	'password_format_wrong' => 'Password length limit 8-16 bits.',
	'mobile_area_wrong' => 'Please select mobile area code',
	'mobile_check_code_wrong' => 'Verification code error',
    'success' => 'Success',
    'fail' => 'Fail',
];
