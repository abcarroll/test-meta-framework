<?php
// A.B. Carroll <ben@hl9.net>
// MIT License


namespace abc\Cli;

use \abc\App as AppInterface;
use \abc\AppConfig;

class Daemon implements AppInterface {
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