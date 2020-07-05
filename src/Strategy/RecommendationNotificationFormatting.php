<?php


namespace App\Strategy;


use App\Model\Content;
use App\Entity\Notification;
use App\Interfaces\NotificationContentFormatStrategyInterface;

/**
 * Class RecommendationNotificationFormatting
 */
class RecommendationNotificationFormatting implements NotificationContentFormatStrategyInterface
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function format(Notification $notification): Content
    {
        $content = $notification->getContent();
        $content->setDescription($notification->getUser()->getName() . ' recommande : ' . $notification->getContentType());

        return $content;
    }
}
