<?php


namespace App\DataObject;

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

    /** @var bool */
    private $read = false;

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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     * @return array
     */
    public function addContentBound(array $attributes): array
    {
        foreach ($attributes as $ind => $value) {
            $this->contentBound[$ind] = $value;
        }
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
     */
    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
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
     */
    public function setAuthorName(string $authorName): void
    {
        $this->authorName = $authorName;
    }

    /**
     * @return bool
     */
    public function isRead(): bool
    {
        return $this->read;
    }

    /**
     * @param bool $read
     */
    public function setRead(bool $read): void
    {
        $this->read = $read;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}