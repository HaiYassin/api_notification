<?php


namespace App\Entity;


use App\DataObject\Content;
use App\Interfaces\NotificationContentFormat;

/**
 * Class CoreNotification
 */
class CoreNotification implements NotificationContentFormat
{
    public function format(Notification $notification): Content
    {
        $content = new Content();

        $content
            ->setDescription($notification->getDescription())
            ->setAuthorName($notification->getUser()->getName())
            ->setAuthorAvatar($notification->getUser()->getProfilePictureLink())
            ->setView($notification->isView())
        ;

        return $content;
    }
}