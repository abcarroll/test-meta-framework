<?php
// (C) Copyright 2017 A.B. Carroll <ben@hl9.net>
// unless otherwise noted.  Read README.md for licensing details.

namespace abc\Ds;

/**
 * A Vector is a sequence of values in a contiguous buffer that grows and
 * shrinks automatically. It’s the most efficient sequential structure because
 * a value’s index is a direct mapping to its index in the buffer, and the
 * growth factor isn't bound to a specific multiple or exponent.
 *
 * @package abc\Ds
 */
class Vector implements \IteratorAggregate, \ArrayAccess, Sequence
{
    use Traits\GenericCollection;
    use Traits\GenericSequence;
    use Traits\Capacity;

    const MIN_CAPACITY = 10;

    /**
     * Called when capacity should be increased to accommodate new values.
     */
    protected function increaseCapacity()
    {
        $size = count($this);

        if ($size > $this->capacity) {
            $this->capacity = max(intval($this->capacity * 1.5), $size);
        }
    }
}
