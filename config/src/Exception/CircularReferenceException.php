<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

// A.B. Carroll <ben@hl9.net>
// MIT License

namespace abc\Config\Exception;

/**
 * A Circular Reference was detected when loading the configuration.
 *
 * For compatibility with config packages that can self-reference.
 *
 * @package abc\Config\Exception
 * @link    http://github.com/ab-php/config
 * @license MIT
 */
class CircularReferenceException extends \abc\Config\ConfigException
{

}