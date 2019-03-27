<?php

namespace SportsruApi\Entity;

class News
{
    /** @var int */
    private $commentsCount;

    /** @var string */
    private $contentOrigin;

    /** @var string */
    private $desktopUrl;

    /** @var int */
    private $id;

    /** @var string */
    private $image;

    /** @var bool */
    private $main;

    /** @var bool */
    private $mainInSection;

    /** @var string */
    private $mediaType;

    /** @var string */
    private $mobileUrl;

    /** @var \DateTimeInterface */
    private $publishedAt;

    /** @var array */
    private $section;

    /** @var array */
    private $socialImage;

    /** @var array */
    private $source;

    /** @var string */
    private $title;

    /**
     * @return int
     */
    public function getCommentsCount(): int
    {
        return $this->commentsCount;
    }

    /**
     * @param int $commentsCount
     */
    public function setCommentsCount(int $commentsCount): void
    {
        $this->commentsCount = $commentsCount;
    }

    /**
     * @return string
     */
    public function getDesktopUrl(): string
    {
        return $this->desktopUrl;
    }

    /**
     * @param string $desktopUrl
     */
    public function setDesktopUrl(string $desktopUrl): void
    {
        $this->desktopUrl = $desktopUrl;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isMain(): bool
    {
        return $this->main;
    }

    /**
     * @param bool $main
     */
    public function setMain(bool $main): void
    {
        $this->main = $main;
    }

    /**
     * @return bool
     */
    public function isMainInSection(): bool
    {
        return $this->mainInSection;
    }

    /**
     * @param bool $mainInSection
     */
    public function setMainInSection(bool $mainInSection): void
    {
        $this->mainInSection = $mainInSection;
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     */
    public function setMediaType(string $mediaType): void
    {
        $this->mediaType = $mediaType;
    }

    /**
     * @return string
     */
    public function getMobileUrl(): string
    {
        return $this->mobileUrl;
    }

    /**
     * @param string $mobileUrl
     */
    public function setMobileUrl(string $mobileUrl): void
    {
        $this->mobileUrl = $mobileUrl;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPublishedAt(): \DateTimeInterface
    {
        return $this->publishedAt;
    }

    /**
     * @param \DateTimeInterface $publishedAt
     */
    public function setPublishedAt(\DateTimeInterface $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }
}
