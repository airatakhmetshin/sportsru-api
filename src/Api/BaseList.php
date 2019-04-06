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
    public function setLastPublished(\DateTimeInterface $time)
    {
        $this->lastPublished = $time->getTimestamp();
    }

    protected static function makeUrl(string $path, array $args): string
    {
        return Client::BASE_HOST . $path . '?args=' . json_encode($args);
    }
}
