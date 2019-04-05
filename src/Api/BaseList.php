<?php

namespace SportsruApi\Api;

use SportsruApi\HttpClient;

class BaseList
{
    private const HOST = 'https://www.sports.ru';

    protected const DEFAULT_COUNT = 10;

    /** @var HttpClient */
    protected $httpClient;

    /** @var int */
    protected $lastPublished;

    /**
     * BaseController constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param \DateTimeInterface $time
     */
    public function setLastPublished(\DateTimeInterface $time)
    {
        $this->lastPublished = $time->getTimestamp();
    }

    protected function makeUrl(string $path, array $args): string
    {
        return self::HOST . $path . json_encode($args);
    }
}
