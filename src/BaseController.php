<?php

namespace SportsruApi;

class BaseController
{
    private const HOST = 'https://www.sports.ru';

    protected const DEFAULT_COUNT = 10;

    /** @var HttpClient */
    protected $httpClient;

    /**
     * BaseController constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function makeUrl(string $path, array $args): string
    {
        return self::HOST . $path . json_encode($args);
    }
}