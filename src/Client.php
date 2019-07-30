<?php

namespace SportsruApi;

use SportsruApi\Api\ArticleList;
use SportsruApi\Api\Comment;
use SportsruApi\Api\NewsList;
use SportsruApi\Api\PostList;

class Client
{
    /** @var string */
    public const BASE_HOST = 'https://www.sports.ru';

    /** @var array */
    public const CATEGORIES = [
        'football',
        'hockey',
        'basketball',
        'automoto',
        'tennis',
        'boxing',
        'figure-skating',
        'biathlon',
        'aquatics'
    ];

    /** @var HttpClient */
    private $httpClient;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient();
    }

    public function article(): ArticleList
    {
        return new ArticleList($this->httpClient);
    }

    public function news(): NewsList
    {
        return new NewsList($this->httpClient);
    }

    public function post(): PostList
    {
        return new PostList($this->httpClient);
    }

    public function comment(): Comment
    {
        return new Comment($this->httpClient);
    }
}
