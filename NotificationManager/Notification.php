<?php
/**
 * Created by PhpStorm.
 * User: -
 * Date: 7/1/2017
 * Time: 2:31 PM
 */
abstract class Notification
{
    protected $recipient;
    protected $sender;
    protected $unread;
    protected $type;
    protected $parameters;
    protected $referenceId;
    protected $createdAt;

    /**
     * Message generators that have to be defined in subclasses
     */
    public function messageForNotification(Notification $notification) : string;
    public function messageForNotifications(array $notifications) : string;

    /**
     * Generate message of the current notification.
     */
    public function message() : string
    {
        return $this->messageForNotification($this);
    }
}