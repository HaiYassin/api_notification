<?php


namespace App\Factory;

use App\Entity\Notification;
use App\Model\Content;

/**
 * Class ContentFactory
 */
class ContentFactory
{
    /**
     * @param Notification $notification
     *
     * @return Content
     */
    public function createContentModel(Notification $notification): Content
    {
        $content = new Content();
        $content
            ->setElapsedTime($notification->getCreatedAt())
            ->setAuthorName($notification->getUser()->getName())
            ->setAuthorAvatar($notification->getUser()->getImg())
            ->setView(true)
            ->setValidityTime($notification->getValidityTime())
            ->addContentRelated($notification->getContentRelated())
        ;

        return $content;
    }
}