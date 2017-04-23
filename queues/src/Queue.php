<?php

namespace abc;

/**
 * @package abc\Queue
 */
interface Queue extends \Countable
{
    /**
     * @param \abc\Queue\Envelope  $envelope
     */
    public function enqueue(\abc\Queue\Envelope  $envelope);

    /**
     * @return \abc\Queue\Envelope 
     */
    public function dequeue();

    /**
     * Closes the queue, a closed queue should not be able to perform
     * actions.
     * 
     * @return int
     */
    public function close();

    /**
     * @param int $index
     * @param int $limit
     *
     * @return array
     */
    public function peek($index = 0, $limit = 20);

    /**
     * SQS requires that a message will be acknowledged or it will be moved back
     * into the queue.
     *
     * @param \abc\Queue\Envelope  $envelope
     */
    public function acknowledge(\abc\Queue\Envelope  $envelope);

    /**
     * Return the queue textual representation, normally this will be name (not the internal key)
     *
     * @return string
     */
    public function __toString();
}