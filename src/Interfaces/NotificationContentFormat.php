<?php


namespace App\Interfaces;


use App\DataObject\Content;
use App\Entity\Notification;

/**
 * Interface NotificationContentFormat
 */
interface NotificationContentFormat
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function format(Notification $notification): Content;
}
