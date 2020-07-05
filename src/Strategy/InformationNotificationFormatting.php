<?php


namespace App\Strategy;


use App\Model\Content;
use App\Entity\Notification;
use App\Interfaces\NotificationContentFormatStrategyInterface;

/**
 * Class InformationNotificationFormatting
 * @package App\Strategy
*/
class InformationNotificationFormatting implements NotificationContentFormatStrategyInterface
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function format(Notification $notification): Content
    {
        $content = $notification->getContent();
        $content->setDescription($notification->getDescription());

        return $content;
    }
}
