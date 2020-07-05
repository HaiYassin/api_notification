<?php


namespace App\Interfaces;


use App\Model\Content;
use App\Entity\Notification;

/**
 * Interface NotificationContentFormatStrategyInterface
 */
interface NotificationContentFormatStrategyInterface
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function format(Notification $notification): Content;
}