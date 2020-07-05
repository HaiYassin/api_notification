<?php

namespace App\Entity;

use App\Model\Content;
use App\Entity\Repository\NotificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 * @ORM\Table(name="notification")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Assert\Choice(
     *     choices={
     *     "recommendation",
     *     "newness",
     *     "shared",
     *     "information"
     *     },
     *     message="Choose a valid type"
     * )
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $contentType;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $contentRelated = [];

    /**
     * @var Content
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int
     * @ORM\Column(name="validity_time")
     */
    private $validityTime;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="notifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="UserNotification", mappedBy="notification")
     * @ORM\Column(nullable=true)
     */
    private $userNotifications;

    public function __construct()
    {
        $this->userNotifications = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     *
     * @return Notification
     */
    public function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return array
     */
    public function getContentRelated(): array
    {
        return $this->contentRelated;
    }

    /**
     * @param array $contentRelated
     *
     * @return Notification
     */
    public function setContentRelated(array $contentRelated): self
    {
        $this->contentRelated = $contentRelated;

        return $this;
    }

    /**
     * @return Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @param Content $content
     *
     * @return Notification
     */
    public function setContent(Content $content): self
    {
        $this->content = $content;

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
     * @return Notification
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return Notification
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getValidityTime(): int
    {
        return $this->validityTime;
    }

    /**
     * @param int $validityTime
     *
     * @return Notification
     */
    public function setValidityTime(int $validityTime): self
    {
        $this->validityTime = $validityTime;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Notification
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return ArrayCollection|null
     */
    public function getUserNotifications()
    {
        return $this->userNotifications;
    }

    /**
     * @param UserNotification $userNotification
     *
     * @return Notification
     */
    public function addNUserNotification(UserNotification $userNotification): self
    {
        if (!$this->userNotifications->contains($userNotification)) {
            $this->userNotifications[] = $userNotification;
            $userNotification->setNotification($this);
        }

        return $this;
    }

    /**
     * @param UserNotification $userNotification
     *
     * @return Notification
     */
    public function removeUserNotification(UserNotification $userNotification): self
    {
        if (!$this->userNotifications->contains($userNotification)) {
            return $this;
        }

        $this->userNotifications->removeElement($userNotification);
        $userNotification->setNotification(null);

        return $this;
    }

    public function setUserNotifications(?string $userNotifications): self
    {
        $this->userNotifications = $userNotifications;

        return $this;
    }
}
