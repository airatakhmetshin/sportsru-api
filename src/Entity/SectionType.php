<?php

namespace SportsruApi\Entity;

class SectionType
{
    /** @var int */
    private $id;

    /** @var int */
    private $parentId;

    /** @var string */
    private $name;

    /** @var string */
    private $webname;

    /** @var string */
    private $url;

    /** @var string */
    private $mobileUrl;

    /**
     * SectionType constructor.
     * @param array $section
     */
    public function __construct(array $section)
    {
        $this->setId($section['id']);
        $this->setParentId($section['parent_id']);
        $this->setName($section['name']);
        $this->setWebname($section['webname']);
        $this->setUrl($section['url']);
        $this->setMobileUrl($section['mobile_url']);
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
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     */
    private function setParentId(int $parentId): void
    {
        $this->parentId = $parentId;
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
    public function getWebname(): string
    {
        return $this->webname;
    }

    /**
     * @param string $webname
     */
    private function setWebname(string $webname): void
    {
        $this->webname = $webname;
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
