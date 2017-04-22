<?php

class DotAccessibleAppConfig implements \abc\AppConfig
{
    public $config;

    public function __construct(\abc\AppConfig $next)
    {
        $this->config = $next;
    }

    private function dottedGetSet(...$args)
    {
        if(count($args) > 0) {
            $loc = &$this->config;
            $optionParts = explode('.', $args[0]);
            foreach($optionParts as $nextPart) {
                if(isset($loc[$nextPart])) {
                    $loc = &$loc[$nextPart];
                } else {
                    return null;
                }
            }
            if(count($args) > 1) {
                // set the by-reference value
                $loc = $args[1];
            }

            return $args[0];
        }

        return null;
    }

    public function has($option)
    {
        return $this->config->has($option);
    }

    public function get($option)
    {
        return $this->dottedGetSet($option);
    }

    public function set($option, $value)
    {
        $this->dottedGetSet($option, $value);
    }

    public function remove($option)
    {
        unset($this->config[$option]);
    }

    public function setAll(array $entireConfig)
    {
        $this->config->setAll($entireConfig);
    }

    public function getAll()
    {
        return $this->config->getAll();
    }

    public function loadFromFile($filename)
    {
        $this->config = $this->config->loadFromFile($filename);
    }

    public function offsetExists($offset)
    {
        return $this->config->has($offset);
    }

    public function offsetGet($offset)
    {
        return $this->config->get($offset);
    }

    public function offsetSet($offset, $value)
    {
        return $this->config->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        return $this->config->remove($offset);
    }

}