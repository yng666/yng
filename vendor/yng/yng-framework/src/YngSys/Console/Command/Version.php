<?php
declare (strict_types = 1);

namespace Yng\Console\command;

use Yng\Console\Command;
use Yng\Console\Input;
use Yng\Console\Output;

class Version extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('version')->setDescription('show yngphp framework version');
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln('v' . $this->app->version());
    }

}
