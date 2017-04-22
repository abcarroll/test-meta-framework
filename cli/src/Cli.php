<?php
// A.B. Carroll <ben@hl9.net>

namespace abc\Cli;

use abc\App as AppInterface;
use abc\AppConfig;

class App implements AppInterface
{
    protected $config;

    public function setConfig(AppConfig $config)
    {
        $this->config = $config;
    }

    public function run()
    {
        // TODO: Implement run() method.
    }

}