<?php

namespace SportsruApi;

class HttpClient
{
    /**
     * @param string $url
     * @return null|string
     */
    public function request(string $url): ?string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response ? $response : null;
    }
}
