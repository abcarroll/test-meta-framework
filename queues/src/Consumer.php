<?php

namespace abc\Queue;

use abc\Envelope;
use abc\Queue;


/**
 * @package Consumer
 */
interface Consumer
{
    /**
     * Starts an infinite loop calling Consumer::tick();
     *
     * @param Queue $queue
     * @param array $options
     */
    public function consume(Queue $queue, array $options = []);

    /**
     * Returns true do indicate it should be run again or false to indicate
     * it should not be run again.
     *
     * @param Queue $queue
     * @param array $options
     *
     * @return bool
     */
    public function tick(Queue $queue, array $options = []);

    /**
     * Mark Consumer as shutdown
     */
    public function shutdown();

    /**
     * Pause consuming
     */
    public function pause();

    /**
     * Resume consuming
     */
    public function resume();

    /**
     * Until there is a real extension point to doing invoked stuff, this can be used
     * by wrapping the invoke method.
     *
     * @param Envelope $envelope
     * @param Queue    $queue
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function invoke(Envelope $envelope, Queue $queue);
}