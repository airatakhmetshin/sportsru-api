<?php

namespace SportsruApi\Api;

use SportsruApi\Factory\ArticleFactory;
use SportsruApi\HttpClient;

class ArticleList extends BaseList implements ApiInterface
{
    /** @var string */
    private const PATH = '/core/article/list/';

    /** @var string */
    public const TYPE_HOMEPAGE = 'homepage';

    /** @var string */
    public const TYPE_SECTION_NAME = 'section-name';

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

    public function getAll(
        string $category = null,
        string $type = null,
        int $count = parent::DEFAULT_COUNT
    ) {
        if ($category && !$this->isCategory($category)) {
            throw new \RuntimeException("category not found: $category");
        }

        $type = $type ?: self::TYPE_SECTION_NAME;

        if (!in_array($type, [self::TYPE_HOMEPAGE, self::TYPE_SECTION_NAME], true)) {
            throw new \RuntimeException("type not found: $type");
        }

        $args = [
            'filter' => [
                'type'     => $type,
                'name'     => $category ?: '',
                'sub-name' => ''
            ],
            'count'          => $count,
            'last_published' => $this->lastPublished ?? time()
        ];

        $response = $this->httpClient->request(BaseList::makeUrl(self::PATH, $args))->json();

        return array_map(function ($article) {
            return $this->factory->create($article);
        }, $response['documents']);
    }
}
