<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

namespace abc;

/**
 * Defines a very simple CommandBus.
 *
 * @package abc
 */
interface CommandBus
{
    /**
     * @param Middleware[] $middleware
     */
    public function __construct(array $middleware);

    /**
     * Executes the given command and optionally returns a value
     *
     * @param object $command
     *
     * @return mixed
     */
    public function handle($command);
}