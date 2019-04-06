<?php

namespace SportsruApi\Api;

use SportsruApi\Factory\PostFactory;
use SportsruApi\HttpClient;

class PostList extends BaseList implements ApiInterface
{
    const PATH = '/core/post/list/';

    /** @var HttpClient */
    private $httpClient;

    /** @var PostFactory */
    private $factory;

    /**
     * PostList constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->factory    = new PostFactory();
    }

    public function getAll(
        string $category,
        int $count = parent::DEFAULT_COUNT,
        string $type = null,
        bool $best = false,
        bool $showAvatar = false
    ) {
        $args = [
            'filter' => [
                'type'         => $type === 'homepage' ? $type : 'section-name',
                'name'         => $category,
                'article_type' => $best ? 'best' : 'all'
            ],
            'count'          => $count,
            'last_published' => $this->lastPublished ?? time(),
            'show_avatar'    => $showAvatar ? 1 : 0
        ];

        $response = $this->httpClient->request(BaseList::makeUrl(self::PATH, $args))->json();

        return array_map(function ($post) {
            return $this->factory->create($post);
        }, $response['documents']);
    }
}
