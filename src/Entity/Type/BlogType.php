<?php

namespace SportsruApi\Entity\Type;

class BlogType
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $subtitle;

    /** @var string */
    private $avatar;

    /** @var string */
    private $url;

    /** @var string */
    private $mobileUrl;

    /**
     * BlogType constructor.
     * @param array $blog
     */
    public function __construct(array $blog)
    {
        $this->setId($blog['id']);
        $this->setName($blog['name']);
        $this->setSubtitle($blog['subtitle']);
        $this->setAvatar($blog['avatar']);
        $this->setUrl($blog['url']);
        $this->setMobileUrl($blog['mobile_url']);
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
    private function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     */
    private function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    private function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    private function setUrl(string $url): void
    {
        $this->url = $url;
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
    private function setMobileUrl(string $mobileUrl): void
    {
        $this->mobileUrl = $mobileUrl;
    }
}
