<?php
// A.B. Carroll <ben@hl9.net>
// MIT License

use \Psr\Container as PsrContainer;
use \Dice\Dice;

class DiceContainer implements PsrContainer\ContainerInterface
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