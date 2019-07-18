<?php

namespace SportsruApi\Api\Options;

class NewsListOptions
{
    /** @var string */
    public const TYPE_HOMEPAGE = 'homepage';

    /** @var string */
    public const TYPE_SECTION_NAME = 'section-name';

    /** @var string */
    public const NEWS_TYPE_ALL = 'all';

    /** @var string */
    public const NEWS_TYPE_MAIN = 'main';

    /** @var string */
    public const NEWS_TYPE_SECONDARY = 'secondary';

    /** @var string */
    public const CONTENT_ORIGIN_ALL = 'all';

    /** @var string */
    public const CONTENT_ORIGIN_MIXED = 'mixed';

    /** @var string */
    public const CONTENT_ORIGIN_EDITORIAL = 'editorial';

    /** @var string */
    public const CONTENT_ORIGIN_USER = 'user';

    /** @var string */
    private $type;

    /** @var string */
    private $newsType;

    /** @var string */
    private $contentOrigin;

    /**
     * NewsListOptions constructor.
     */
    public function __construct()
    {
        $this->type          = self::TYPE_SECTION_NAME;
        $this->newsType      = self::NEWS_TYPE_ALL;
        $this->contentOrigin = self::CONTENT_ORIGIN_ALL;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        if (!in_array($type, [
            self::TYPE_HOMEPAGE,
            self::TYPE_SECTION_NAME
        ], true)) {
            throw new \RuntimeException("invalid type: $type");
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getNewsType(): string
    {
        return $this->newsType;
    }

    /**
     * @param string $newsType
     */
    public function setNewsType(string $newsType): void
    {
        if (!in_array($newsType, [
            self::NEWS_TYPE_ALL,
            self::NEWS_TYPE_MAIN,
            self::NEWS_TYPE_SECONDARY
        ], true)) {
            throw new \RuntimeException("invalid newsType: $newsType");
        }

        $this->newsType = $newsType;
    }

    /**
     * @return string
     */
    public function getContentOrigin(): string
    {
        return $this->contentOrigin;
    }

    /**
     * @param string $contentOrigin
     */
    public function setContentOrigin(string $contentOrigin): void
    {
        if (!in_array($contentOrigin, [
            self::CONTENT_ORIGIN_ALL,
            self::CONTENT_ORIGIN_MIXED,
            self::CONTENT_ORIGIN_EDITORIAL,
            self::CONTENT_ORIGIN_USER
        ], true)) {
            throw new \RuntimeException("invalid contentOrigin: $contentOrigin");
        }

        $this->contentOrigin = $contentOrigin;
    }
}
