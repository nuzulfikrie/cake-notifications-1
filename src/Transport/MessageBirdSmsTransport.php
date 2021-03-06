<?php
/**
 * Description of MessageBirdSMSTransport
 *
 * @author michiel
 */

namespace CakeNotifications\Transport;

use CakeNotifications\Transport\AbstractTransport;
use MessageBird\Client;
use CakeNotifications\Model\Entity\Notification;
use MessageBird\Objects\Message;
use Cake\Core\Configure;

/**
 * Description of MessageBirdSMSTransport
 *
 * @author michiel
 */
class MessageBirdSmsTransport extends AbstractTransport {
    
    /**
     * Sends an Message bird SMS
     * @param string $message
     * @param string $to
     * @param \CakeNotifications\Transport\SMSTransport\Notification $notification
     * @return boolean
     */
    public function send(string $message, array $to, Notification $notification = null) : bool
    {
        $MessageBird = new Client($this->getConfig('key'));
        $Message = new Message();
        $Message->originator = $this->getConfig('originator');
        $Message->recipients = $notification->recipients['sms'];
        $Message->body = $message;

        $msg = $MessageBird->messages->create($Message); 
        
        return !empty($msg); // no exception, so it is scheduled.
    }
}
