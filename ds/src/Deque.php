<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

namespace abc\Ds;

/**
 * A Deque (pronounced "deck") is a sequence of values in a contiguous buffer
 * that grows and shrinks automatically. The name is a common abbreviation of
 * "double-ended queue".
 *
 * While a Deque is very similar to a Vector, it offers constant time operations
 * at both ends of the buffer, ie. shift, unshift, push and pop are all O(1).
 *
 * @package abc\Ds
 */
class Deque implements \IteratorAggregate, \ArrayAccess, Sequence
{
    use Traits\GenericCollection;
    use Traits\GenericSequence;
    use Traits\SquaredCapacity;

    const MIN_CAPACITY = 8;
}
