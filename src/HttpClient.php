<?php

namespace SportsruApi;

class HttpClient
{
    /** @var string|null */
    protected $response = null;

    /**
     * @param string $url
     * @return HttpClient
     */
    public function request(string $url): self
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $this->response = curl_exec($ch);

        curl_close($ch);

        return $this;
    }

    /**
     * @return string
     */
    public function body(): string
    {
        return $this->response ? $this->response : '';
    }

    /**
     * @return array
     */
    public function json(): array
    {
        return $this->response ? json_decode($this->response, true) : [];
    }
}
