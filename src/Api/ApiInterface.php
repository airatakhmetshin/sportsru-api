<?php

namespace SportsruApi\Api;

use SportsruApi\HttpClient;

interface ApiInterface
{
    public function __construct(HttpClient $httpClient);
}
