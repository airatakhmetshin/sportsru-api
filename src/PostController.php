<?php

namespace SportsruApi;

class PostController extends BaseController
{
    const PATH = '/core/post/list/?args=';

    /**
     * PostController constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        parent::__construct($httpClient);
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
            'last_published' => time(),
            'show_avatar'    => $showAvatar ? 1 : 0
        ];

        $url = $this->makeUrl(self::PATH, $args);

        $posts = json_decode($this->httpClient->request($url), true);

        return $posts['documents'];
    }
}
