<?php

namespace SportsruApi\Entity;

class Post
{
    /** @var array */
    private $authors;

    /** @var string */
    private $avatar;

    /** @var array */
    private $blog;

    /** @var string */
    private $brief;

    /** @var int */
    private $commentsCount;

    /** @var string */
    private $desktopUrl;

    /** @var array */
    private $feedImage;

    /** @var int */
    private $id;

    /** @var string */
    private $mediaSrc;

    /** @var string */
    private $mobileUrl;

    /** @var \DateTimeInterface */
    private $publishedAt;

    /** @var array */
    private $rating;

    /** @var string */
    private $title;

    /** @var bool */
    private $ugcMaterial;

    /**
     * @return string
     */
    public function getBrief(): string
    {
        return $this->brief;
    }

    /**
     * @param string $brief
     */
    public function setBrief(string $brief): void
    {
        $this->brief = $brief;
    }

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
     * @return string
     */
    public function getMediaSrc(): string
    {
        return $this->mediaSrc;
    }

    /**
     * @param string $mediaSrc
     */
    public function setMediaSrc(string $mediaSrc): void
    {
        $this->mediaSrc = $mediaSrc;
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
     * @param \DateTimeInterface $published
     */
    public function setPublishedAt(\DateTimeInterface $published): void
    {
        $this->publishedAt = $published;
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
}
