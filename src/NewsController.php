<?php

namespace SportsruApi;

class NewsController extends BaseController
{
    /** @var string */
    private const PATH = '/core/news/list/?args=';

    /** @var string */
    public const CONTENT_ORIGIN_ALL = 'all';

    /** @var string */
    public const CONTENT_ORIGIN_MIXED = 'mixed';

    /** @var string */
    public const CONTENT_ORIGIN_EDITORIAL = 'editorial';

    /** @var string */
    public const CONTENT_ORIGIN_USER = 'user';

    /**
     * NewsController constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        parent::__construct($httpClient);
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
            'last_published' => time()
        ];

        $url = $this->makeUrl(self::PATH, $args);

        $news = json_decode($this->httpClient->request($url), true);

        return $news;
    }
}
