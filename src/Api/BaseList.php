<?php

namespace SportsruApi\Api;

use SportsruApi\Client;

class BaseList
{
    protected const DEFAULT_COUNT = 10;

    /** @var int */
    protected $lastPublished;

    /**
     * @param \DateTimeInterface $time
     */
    public function setLastPublished(\DateTimeInterface $time): void
    {
        $this->lastPublished = $time->getTimestamp();
    }

    /**
     * @param string $category
     * @return bool
     */
    protected function isCategory(string $category): bool
    {
        return in_array($category, Client::CATEGORIES, true);
    }

    protected static function makeUrl(string $path, array $args): string
    {
        return Client::BASE_HOST . $path . '?args=' . json_encode($args);
    }
}
