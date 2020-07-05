<?php


namespace App\Strategy;


use App\Model\Content;
use App\Entity\Notification;
use App\Interfaces\NotificationContentFormatStrategyInterface;

/**
 * Class SharedNotificationFormatting
 */
class SharedNotificationFormatting implements NotificationContentFormatStrategyInterface
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function format(Notification $notification): Content
    {
        $content = $notification->getContent();
        $content->setDescription($notification->getUser()->getName() . ' a partagé : ' . $notification->getContentType() . ' avec vous.');

        return $content;
    }
}
