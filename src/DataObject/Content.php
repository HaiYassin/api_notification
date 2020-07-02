<?php


namespace App\DataObject;

use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Content
 *
 * Class model to our API Format
 */
class Content implements \JsonSerializable
{
    /** @var string */
    private $description;

    /** @var array */
    private $contentBound;

    /** @var string */
    private $contentType;

    /** @var string */
    private $authorName;

    /** @var string */
    private $authorAvatar;

    /** @var DateTime */
    private $elapsedTime;

    /** @var bool */
    private $view = false;

    /**
     * Content constructor.
     */
    public function __construct()
    {
        $this->contentBound = [];
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Content
     */
    public function setDescription(string $description): Content
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getContentBound(): array
    {
        return $this->contentBound;
    }

    /**
     * @param array $attributes
     *
     * @return Content
     */
    public function addContentBound(array $attributes): Content
    {
        foreach ($attributes as $ind => $value) {
            $this->contentBound[$ind] = $value;
        }

        return $this;
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
     * @return Content
     */
    public function setContentType(string $contentType): Content
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * @param string $authorName
     *
     * @return Content
     */
    public function setAuthorName(string $authorName): Content
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorAvatar(): string
    {
        return $this->authorAvatar;
    }

    /**
     * @param string $authorAvatar
     *
     * @return Content
     */
    public function setAuthorAvatar(string $authorAvatar): Content
    {
        $this->authorAvatar = $authorAvatar;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getElapsedTime(): DateTime
    {
        return $this->elapsedTime;
    }

    /**
     * @param DateTime $elapsedTime
     *
     * @return Content
     */
    public function setElapsedTime(DateTime $elapsedTime): Content
    {
        $this->elapsedTime = $elapsedTime;

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
     * @return Content
     */
    public function setView(bool $view): Content
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}