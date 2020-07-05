<?php


namespace App\Strategy;


use App\Model\Content;
use App\Entity\Notification;
use App\Interfaces\NotificationContentFormatStrategyInterface;

/**
 * Class NewnessNotificationFormatting
 */
class NewnessNotificationFormatting implements NotificationContentFormatStrategyInterface
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function format(Notification $notification): Content
    {
        $content = $notification->getContent();
        $content->setDescription($notification->getUser()->getName() . 'a sorti ' . $notification->getContentType() );

        return $content;
    }
}
