<?php

namespace SportsruApi\Entity;

use SportsruApi\Entity\Type\SectionType;

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

    /** @var string */
    private $imageUrl;

    /** @var string */
    private $bigImageUrl;

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
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     */
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getBigImageUrl(): string
    {
        return $this->bigImageUrl;
    }

    /**
     * @param string $bigImageUrl
     */
    public function setBigImageUrl(string $bigImageUrl): void
    {
        $this->bigImageUrl = $bigImageUrl;
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
        $this->title = html_entity_decode($title);
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
