<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

namespace abc\CommandBus\Adapter\Tactician;

/**
 * Use tactician as an adapter for \abc\CommandBus
 *
 * @package abc\CommandBus
 */
class CommandBus implements \abc\CommandBus
{
    /**
     * @var \League\Tactician\CommandBus
     */
    protected $adapter;

    /**
     * @inheritDoc
     */
    public function __construct(array $middleware)
    {
        $this->adapter = new \League\Tactician\CommandBus($middleware);
    }

    /**
     * @inheritDoc
     */
    public function handle($command)
    {
        return $this->adapter->handle($command);
    }

}