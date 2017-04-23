<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

// A.B. Carroll <ben@hl9.net>
// MIT License

namespace abc\Di;

use \Psr\Container as PsrContainer;
use \Dice\Dice;

class Container implements PsrContainer\ContainerInterface
{
    protected $dice;

    public function __construct(Dice $dice)
    {
        $this->dice = $dice;
    }

    static public function createFromDiceJsonFile($filePath)
    {
        $jsonLoader = new \Dice\Loader\Json();

        return $jsonLoader->load($filePath);
    }

    static public function createFromDiceJsonStr($jsonStr)
    {
        $jsonLoader = new \Dice\Loader\Json();

        return $jsonLoader->load($jsonStr);
    }

    public function get($id)
    {
        if($this->has($id)) {
            return $this->dice->create($id);
        } else {
            throw new NotFoundException('Could not instantiate ' . $id);
        }
    }

    public function has($id)
    {
        return (class_exists($id) || $this->dice->getRule($id) != $this->dice->getRule('*'));
    }
}