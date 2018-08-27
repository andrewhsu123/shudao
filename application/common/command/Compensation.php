<?php
namespace app\common\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;

use app\userfish\model\SettingFishAttrModel;
use app\userfish\model\SettingFishEvolutionModel;
use app\common\service\Calculation;

class Compensation extends Command
{
    protected function configure()
    {
        $this->setName('compensation')->setDescription('有创建角色但没有鱼的玩家补偿一条鱼苗');
    }

    protected function execute(Input $input, Output $output) {
        //获取已创建角色的玩家
        $list = Db::table('user')->field('id,country_id,fishery_id')->where('rolename', '<>', '')->select();
        if($list) {
            $fishAttrItem = SettingFishAttrModel::getItem(1, 0);
            $fishEvolutionItem = SettingFishEvolutionModel::getItem(1);
            //送鱼苗
            foreach ($list as $v) {
                $userId = $v['id'];
                //判断玩家没有鱼苗
                $useFishFlag = Db::table('user_fish')->where('user_id', $userId)->count();
                if($fishAttrItem && $fishEvolutionItem && !$useFishFlag) {
                    $strength = $fishAttrItem['strength'];
                    $agility = $fishAttrItem['agility'];
                    $bodyPower = $fishAttrItem['body_power'];
                    $fightPower = Calculation::fightPower($strength, $agility, $bodyPower);
                    $ethWorth = Calculation::ethWorth($strength, $agility, $bodyPower);
                    Db::table('user_fish')->insert([
                        'user_id' => $userId,
                        'name' => $fishAttrItem['name'],
                        'level' => $fishAttrItem['level'],
                        'career' => $fishAttrItem['career'],
                        'strength' => $strength,
                        'agility' => $agility,
                        'body_power' => $bodyPower,
                        'fight_power' => $fightPower,
                        'fight_power_limit' => $fishEvolutionItem['fight_power_limit'],
                        'country_id' => $v['country_id'],
                        'fishery_id' => $v['fishery_id'],
                        'is_initial_fish' => 1,
                        'eth_worth' => $ethWorth,
                        'create_time' => time()
                    ]);
                }
            }
        }

        $output->writeln('Success!~');
    }
}