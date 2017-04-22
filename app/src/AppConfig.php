<?php

namespace abc;

interface AppConfig extends \ArrayAccess, \Traversable
{
    public function has($option);

    public function get($option);

    public function set($option, $value);

    public function remove($option);

    public function setAll(array $entireConfig);

    public function getAll();

    public function loadFromFile($filename);
}