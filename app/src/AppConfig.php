<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

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