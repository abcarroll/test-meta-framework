<?php

namespace abc;

class AppPhpConfig implements AppConfig
{
    protected $config;

    public function has($option)
    {
        return isset($this->config[$option]);
    }

    public function get($option)
    {

    }

    public function set($option, $value)
    {
        $this->config[$option] = $value;
    }

    public function remove($option) {
        unset($this->config[$option]);
    }

    public function loadFromFile($filename)
    {
        if(is_readable($filename)) {
            $this->config = require($filename);
        } else {
            throw new \RuntimeException("Could not load PHP configuration file: " . $filename);
        }
    }

}