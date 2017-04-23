<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

namespace abc\CommandBus\Adapter\Tactician;

class Middleware implements \abc\Middleware
{
    protected $targetHandler;

    public function __construct($compatibleObject)
    {
        if(method_exists($compatibleObject, 'execute')) {
            $this->targetHandler = [$compatibleObject, 'execute'];
        } elseif(method_exists($compatibleObject, 'handle')) {
            $this->targetHandler = [$compatibleObject, 'handle'];
        }
    }

    /**
     * @param object   $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next) {

    }
}