<?php

namespace SportsruApi\Api;

use SportsruApi\Api\Options\NewsListOptions;
use SportsruApi\Factory\NewsFactory;
use SportsruApi\HttpClient;

class NewsList extends BaseList implements ApiInterface
{
    /** @var string */
    private const PATH = '/core/news/list/';

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

    public function getAll(string $category, NewsListOptions $options = null, int $count = parent::DEFAULT_COUNT)
    {
        if ($options === null) {
            $options = new NewsListOptions();
        }

        $args = [
            'filter' => [
                'type'           => $options->getType(),
                'name'           => $category ?: 'null',
                'news_type'      => $options->getNewsType(),
                'content_origin' => $options->getContentOrigin()
            ],
            'count'          => $count,
            'last_published' => $this->lastPublished ?? time()
        ];

        $response = $this->httpClient->request(BaseList::makeUrl(self::PATH, $args))->json();

        return array_map(function ($news) {
            return $this->factory->create($news);
        }, $response);
    }
}
