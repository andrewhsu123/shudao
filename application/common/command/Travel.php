<?php
namespace app\common\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\adventure\model\TravelModel;

class Travel extends Command
{
    protected function configure()
    {
        $this->setName('travel')->setDescription('每小时更新一次');
    }

    protected function execute(Input $input, Output $output)
    {
		TravelModel::traving();

        $output->writeln('[Travel] ' . date('Y-m-d H:i:s') . "：Update travel 3600s");
    }
}


