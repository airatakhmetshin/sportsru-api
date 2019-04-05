<?php

namespace SportsruApi\Api;

use SportsruApi\Factory\ArticleFactory;
use SportsruApi\HttpClient;

class ArticleList extends BaseList implements ApiInterface
{
    /** @var string */
    private const PATH = '/core/article/list/';

    /** @var HttpClient */
    private $httpClient;

    /** @var ArticleFactory */
    private $factory;

    /**
     * ArticleList constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->factory    = new ArticleFactory();
    }

    public function getAll(string $category, int $count = parent::DEFAULT_COUNT)
    {
        $args = [
            'filter' => [
                'type'     => 'section-name',
                'name'     => $category,
                'sub-name' => ''
            ],
            'count'          => $count,
            'last_published' => $this->lastPublished ?? time()
        ];

        $url = $this->makeUrl(self::PATH, $args);

        $response = $this->httpClient->request($url)->json();

        return array_map(function ($article) {
            return $this->factory->create($article);
        }, $response['documents']);
    }
}
