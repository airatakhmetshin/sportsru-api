<?php

namespace SportsruApi\Entity;

class Post
{
    /** @var array */
    private $authors;

    /** @var null|string */
    private $avatar;

    /** @var BlogType */
    private $blog;

    /** @var string */
    private $brief;

    /** @var int */
    private $commentsCount;

    /** @var string */
    private $desktopUrl;

    /** @var null|string */
    private $imageUrl;

    /** @var int */
    private $id;

    /** @var null|string */
    private $mediaSrc;

    /** @var string */
    private $mobileUrl;

    /** @var \DateTimeInterface */
    private $publishedAt;

    /** @var int */
    private $ratingMinus;

    /** @var int */
    private $ratingPlus;

    /** @var string */
    private $title;

    /** @var bool */
    private $ugcMaterial;

    /**
     * @return array
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param AuthorType $author
     */
    public function addAuthor(AuthorType $author): void
    {
        $this->authors[] = $author;
    }

    /**
     * @return null|string
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return BlogType
     */
    public function getBlog(): BlogType
    {
        return $this->blog;
    }

    /**
     * @param BlogType $blog
     */
    public function setBlog(BlogType $blog): void
    {
        $this->blog = $blog;
    }

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
     * @return null|string
     */
    public function getImageUrl(): ?string
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
    public function getMediaSrc(): ?string
    {
        return $this->mediaSrc;
    }

    /**
     * @param string $mediaSrc
     */
    public function setMediaSrc(string $mediaSrc): void
    {
        $this->mediaSrc = str_replace('https://cdn.tribuna.com/fetch/?url=', '', urldecode($mediaSrc));
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
     * @return int
     */
    public function getRatingMinus(): int
    {
        return $this->ratingMinus;
    }

    /**
     * @param int $ratingMinus
     */
    public function setRatingMinus(int $ratingMinus): void
    {
        $this->ratingMinus = $ratingMinus;
    }

    /**
     * @return int
     */
    public function getRatingPlus(): int
    {
        return $this->ratingPlus;
    }

    /**
     * @param int $ratingPlus
     */
    public function setRatingPlus(int $ratingPlus): void
    {
        $this->ratingPlus = $ratingPlus;
    }

    public function getRatingTotal(): int
    {
        return $this->ratingPlus - $this->ratingMinus;
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
