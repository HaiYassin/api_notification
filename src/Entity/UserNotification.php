<?php


namespace App\Entity;

use App\Entity\Repository\UserNotificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserNotification
 *
 * @ORM\Entity(repositoryClass=UserNotificationRepository::class)
 * @ORM\Table(name="user_notification")
 * @ORM\HasLifecycleCallbacks()
 */
class UserNotification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userNotifications")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Notification", inversedBy="userNotifications")
     * @ORM\JoinColumn(name="notification_id", referencedColumnName="id")
     */
    private $notification;

    /**
     * @var boolean
     * @ORM\Column(name="view", nullable=false)
     */
    private $view;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return UserNotification
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Notification
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param Notification|null $notification
     *
     * @return UserNotification
     */
    public function setNotification(?Notification $notification): self
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @return bool
     */
    public function isView(): bool
    {
        return $this->view;
    }

    /**
     * @param bool $view
     *
     * @return UserNotification
     */
    public function setView(bool $view): self
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return UserNotification
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getView(): ?string
    {
        return $this->view;
    }


}