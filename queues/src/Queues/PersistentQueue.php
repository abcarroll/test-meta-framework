<?php
/**
 * Created by IntelliJ IDEA.
 * User: corndog
 * Date: 4/22/17
 * Time: 11:56 AM
 */

namespace abc\Queue;

/**
 * @package Bernard
 */
interface PersistentQueue extends \abc\Queue
{
    /**
     * Register with the driver
     */
    public function register();
}