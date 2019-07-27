<?php

namespace SportsruApi\Entity;

use SportsruApi\Entity\Type\SectionType;

class News
{
    /** @var array */
    private const CONTENT_ORIGIN_VALUES = [
        'all',
        'mixed',
        'editorial',
        'user'
    ];

    /** @var int */
    private $commentsCount;

    /** @var int */
    private $contentOrigin;

    /** @var string */
    private $desktopUrl;

    /** @var int */
    private $id;

    /** @var null|string */
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

    /** @var SectionType */
    private $section;

    /** @var null|string */
    private $sourceUrl;

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
    public function getContentOrigin(): string
    {
        return self::CONTENT_ORIGIN_VALUES[$this->contentOrigin];
    }

    /**
     * @param string $contentOrigin
     */
    public function setContentOrigin(string $contentOrigin): void
    {
        foreach (self::CONTENT_ORIGIN_VALUES as $key => $value) {
            if ($contentOrigin === $value) {
                $this->contentOrigin = $key;
            }
        }
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
     * @return null|string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $http  = 'http';
        $https = 'https';

        if (strpos($image, $http) === 0 ||
            strpos($image, $https) === 0
        ) {
            $this->image = $image;
        }
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

    /**
     * @return SectionType
     */
    public function getSection(): SectionType
    {
        return $this->section;
    }

    /**
     * @param SectionType $section
     */
    public function setSection(SectionType $section): void
    {
        $this->section = $section;
    }

    /**
     * @return null|string
     */
    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }

    /**
     * @param string $sourceUrl
     */
    public function setSourceUrl(string $sourceUrl): void
    {
        $this->sourceUrl = $sourceUrl;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = html_entity_decode($title);
    }
}
