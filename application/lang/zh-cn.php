<?php
use think\Lang;

// Lang::load(APP_PATH . 'lang/zh-cn/user.php');

return [
    'invalid_token'             => '用户未登录',
    'mobile_format_wrong'       => '手机号码格式不正确',
    'mobile_exist'              => '手机号码已注册',
    'password_format_wrong'     => '密码长度为6-16位',
    'mobile_area_wrong'         => '请选择手机区号',
    'mobile_check_code_wrong'   => '验证码错误',
    'success'                   => '成功',
    'fail'                      => '失败',
    'data_exception' => '数据异常',
    'data_not_exist' => '数据不存在',
    'balance_not_enough' => '余额不足',
    'select_devour_target' => '请选择吞噬目标',
    'devour_self' => '不能吞噬自己',
    'reach_fight_power_limit' => '战力超过上限，无法吞噬',
    'reach_top_level' => '已经最高等级，无法再进化',
    'evolve_fight_power_not_enough' => '战力不够，请吞噬再进化',
    'evolve_item_not_enough' => '进化材料不足',
    'account_disabled' => '您的账号已被封禁，请联系客服',
    'devour_disqualification_fish' => '没有满足吞噬条件的鱼',
    'fight_power_limit_or_lack_of_material' => '超过战力上限或材料不足',
];
