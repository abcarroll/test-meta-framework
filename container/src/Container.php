<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

// A.B. Carroll <ben@hl9.net>
// MIT License

namespace abc\Container;

use \Psr\Container as PsrContainer;
use \Dice\Dice;

class Container implements \Interop\Container\ContainerInterface
{
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

    }

}