<?php

namespace Bernard;


use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @package Bernard
 */
interface Producer
{

    /**
     * @param QueueFactory             $queues
     * @param EventDispatcherInterface $dispatcher
     */
    function __construct(QueueFactory $queues, EventDispatcherInterface $dispatcher);

    /**
     * @param Message     $message
     * @param string|null $queueName
     */
    public function produce(Message $message, $queueName = null);
}