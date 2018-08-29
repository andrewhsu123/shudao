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
    'invalid_token' => 'Please log in',
    'data_exception' => 'Data exception',
    'data_not_exist' => 'Data not exist',
    'balance_not_enough' => 'Balance not enough',
    'select_devour_target' => 'Select devour target',
    'devour_self' => 'You cannot devour yourself',
    'reach_fight_power_limit' => 'Already reach fight power limit, cannot devour',
    'reach_top_level' => 'Already highest level, cannot evolve',
    'evolve_fight_power_not_enough' => 'Fight power not enough, please to devour',
    'evolve_item_not_enough' => 'Evolve material not enough',
    'account_disabled' => 'Your account has been disabled, Please contact customer service',
    'devour_disqualification_fish' => 'Fish that do not meet the conditions for phagocytosis',
    'fight_power_limit_or_lack_of_material' => 'Exceeding the maximum combat power or insufficient material',
];
