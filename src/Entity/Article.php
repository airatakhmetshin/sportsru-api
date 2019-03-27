<?php

namespace SportsruApi\Entity;

class Article
{
    /** @var int */
    private $commentsCount;

    /** @var string */
    private $desktopUrl;

    /** @var string */
    private $feature;

    /** @var int */
    private $id;

    /** @var array */
    private $image;

    /** @var array */
    private $images;

    /** @var string */
    private $mobileUrl;

    /** @var \DateTimeInterface */
    private $publishedAt;

    /** @var SectionType */
    private $section;

    /** @var string */
    private $title;

    /** @var bool */
    private $ugcMaterial;

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
     * @return string
     */
    public function getFeature(): string
    {
        return $this->feature;
    }

    /**
     * @param string $feature
     */
    public function setFeature(string $feature): void
    {
        $this->feature = $feature;
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
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isUgcMaterial(): bool
    {
        return $this->ugcMaterial;
    }

    /**
     * @param bool $ugcMaterial
     */
    public function setUgcMaterial(bool $ugcMaterial): void
    {
        $this->ugcMaterial = $ugcMaterial;
    }
}
