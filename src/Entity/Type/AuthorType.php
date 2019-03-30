<?php

namespace SportsruApi\Entity\Type;

class AuthorType
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $url;

    /**
     * AuthorType constructor.
     * @param array $author
     */
    public function __construct(array $author)
    {
        $this->setId($author['id']);
        $this->setName($author['name']);
        $this->setUrl($author['url']);
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
}
