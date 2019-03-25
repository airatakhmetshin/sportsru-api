<?php

namespace SportsruApi;

class ArticleController extends BaseController
{
    /** @var string */
    private const PATH = '/core/article/list/?args=';

    /**
     * ArticleController constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        parent::__construct($httpClient);
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
            'last_published' => time()
        ];

        $url = $this->makeUrl(self::PATH, $args);

        $articles = json_decode($this->httpClient->request($url), true);

        return $articles['documents'];
    }
}
