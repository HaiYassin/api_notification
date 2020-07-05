<?php


namespace App\Strategy;

use App\Entity\Notification;
use App\Interfaces\NotificationContentFormatStrategyInterface;
use App\Model\Content;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class NotificationContentTypeStrategy
 */
class NotificationContentTypeStrategy implements NotificationContentFormatStrategyInterface
{
    protected $notificationContentTypeStrategies;

    public function __construct()
    {
        $this->notificationContentTypeStrategies = new ArrayCollection();
    }

    /**
     * @param Notification $notification
     *
     * @throws \Exception
     *
     * @return Content
     */
    public function format(Notification $notification): Content
    {
        $notificationContentFormatting = $this->getNotificationContentFormatting($notification->getContentType());

        return $notificationContentFormatting->format($notification);
    }

    /**
     * @param string $type
     * @return mixed|null
     * @throws \Exception
     */
    public function getNotificationContentFormatting(string $type)
    {
        if ($this->notificationContentTypeStrategies->containsKey($type)) {
            return $this->notificationContentTypeStrategies->get($type);
        }

        throw new \Exception('error');
    }

    /**
     * @param $type
     * @param NotificationContentFormatStrategyInterface $notificationContentFormatting
     */
    public function addNotificationContentFormatting($type, NotificationContentFormatStrategyInterface $notificationContentFormatting)
    {
        $this->notificationContentTypeStrategies->set($type, $notificationContentFormatting);
    }
}
