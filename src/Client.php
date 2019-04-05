<?php

namespace SportsruApi;

use SportsruApi\Api\ArticleList;
use SportsruApi\Api\NewsList;
use SportsruApi\Api\PostList;

class Client
{
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
}
