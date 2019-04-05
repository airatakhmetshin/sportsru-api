<?php

namespace SportsruApi\Api;

use SportsruApi\Factory\NewsFactory;
use SportsruApi\HttpClient;

class NewsList extends BaseList implements ApiInterface
{
    /** @var string */
    private const PATH = '/core/news/list/';

    /** @var string */
    public const CONTENT_ORIGIN_ALL = 'all';

    /** @var string */
    public const CONTENT_ORIGIN_MIXED = 'mixed';

    /** @var string */
    public const CONTENT_ORIGIN_EDITORIAL = 'editorial';

    /** @var string */
    public const CONTENT_ORIGIN_USER = 'user';

    /** @var HttpClient */
    private $httpClient;

    /** @var NewsFactory */
    private $factory;

    /**
     * NewsList constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->factory    = new NewsFactory();
    }

    public function getAll(
        string $category,
        int $count = parent::DEFAULT_COUNT,
        string $contentOrigin = self::CONTENT_ORIGIN_ALL
    ) {
        $args = [
            'filter' => [
                'type'           => 'section-name',
                'name'           => $category,
                'news_type'      => 'all',
                'content_origin' => $contentOrigin
            ],
            'count'          => $count,
            'last_published' => $this->lastPublished ?? time()
        ];

        $url = $this->makeUrl(self::PATH, $args);

        $response = $this->httpClient->request($url)->json();

        return array_map(function ($news) {
            return $this->factory->create($news);
        }, $response);
    }
}
