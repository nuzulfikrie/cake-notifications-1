<?php
/*
 * @copyright (C) 2020 Michiel Keijts, Normit
 * 
 */

namespace CakeNotifications\Transport;

use CakeNotifications\Model\Entity\Notification;
use Cake\Core\InstanceConfigTrait;

/**
 * Description of NotificationTransportInterface
 *
 * @author michiel
 */
abstract class AbstractTransport extends NotificationTransportInterface {
    /**
     * Default config for this class
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Constructor
     *
     * @param array $config Configuration options.
     */
    public function __construct($config = [])
    {
        $this->setConfig($config);
    }
    
    /**
     * Abstract send method to send the notification to a single recipient
     * @param string $message 
     * @param string $to 
     * @param Notification $notification
     * @return bool
     */
    public function send(string $message, string $to, Notification $notification = null) : bool
    {
                
    }
}
