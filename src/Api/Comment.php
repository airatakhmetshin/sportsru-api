<?php

namespace SportsruApi\Api;

use SportsruApi\Client;
use SportsruApi\Factory\CommentFactory;
use SportsruApi\HttpClient;

class Comment implements ApiInterface
{
    /** @var string */
    private const PATH_GET_IDS = '/core/api/comment/get_ids/?args=';

    /** @var string */
    private const PATH_GET_COMMENT = '/api/comment/get/by_ids.json?';

    /** @var string */
    public const SORT_NEW = 'new';

    /** @var string */
    public const SORT_OLD = 'old';

    /** @var string */
    public const SORT_TOP = 'top10';

    /** @var string */
    public const SORT_ACTUAL = 'actual';

    /** @var string */
    public const SORT_FRIENDS = 'friends';

    /** @var string */
    public const MESSAGE_CLASS_BLOG = 'Sports::Blog::Post::Post';

    /** @var string */
    public const MESSAGE_CLASS_NEWS = 'Sports::News';

    /** @var string */
    public const MESSAGE_CLASS_POLL = 'Sports::Poll';

    /** @var int */
    private const DEFAULT_COMMENTS_COUNT = 15;

    /** @var HttpClient */
    private $httpClient;

    /** @var CommentFactory */
    private $factory;

    /**
     * Comment constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->factory    = new CommentFactory();
    }

    /**
     * @param int $articleId
     * @param string $messageClass
     * @param string $sort
     * @param int $offset
     * @param int $length
     * @return array
     */
    public function getCommentIdsByArticle(
        int $articleId,
        string $messageClass,
        string $sort = self::SORT_NEW,
        int $offset = 0,
        int $length = self::DEFAULT_COMMENTS_COUNT
    ): array {
        if (!in_array($messageClass, [
            self::MESSAGE_CLASS_NEWS,
            self::MESSAGE_CLASS_BLOG,
            self::MESSAGE_CLASS_POLL
        ], true)) {
            throw new \RuntimeException("messageClass $messageClass not found");
        }

        if (!in_array($sort, [
            self::SORT_ACTUAL,
            self::SORT_TOP,
            self::SORT_NEW,
            self::SORT_FRIENDS,
            self::SORT_OLD
        ], true)) {
            throw new \RuntimeException("sort $sort not found");
        }

        $args = [
            'message_id'    => $articleId,
            'message_class' => $messageClass,
            'sort'          => $sort,
        ];

        $response = $this->httpClient->request(
            Client::BASE_HOST . self::PATH_GET_IDS . json_encode($args)
        )->json();

        if (!is_array($response)) {
            throw new \RuntimeException('response is not an array');
        }

        return array_slice($response, $offset, $length);
    }

    /**
     * @param array $commentIds
     * @return array
     */
    public function getCommentByIds(array $commentIds): array
    {
        if (count($commentIds) < 1) {
            throw new \RuntimeException('count of commentIds < 1');
        }

        $batches = [];

        /**
         * API не позволяет получить >50 комментариев одним запросом,
         * поэтому делим на партии и делаем несколько запросов, результат которых потом объединяем в $comments
         */
        foreach (array_chunk($commentIds, 50) as $batch) {
            $args = [
                'comment_ids' => implode(',', $batch),
                'style'       => 'newjs'
            ];

            $response = $this->httpClient->request(
                Client::BASE_HOST . self::PATH_GET_COMMENT . http_build_query($args)
            )->json();

            if ($response['status'] === 'fail') {
                throw new \RuntimeException($response['message']);
            }

            if ($response['status'] === 'success') {
                $batches[] = $response['data']['comments'];
            }
        }

        $comments = array_merge(...$batches);

        /**
         * У полученных с API комментариев $comments нарушена сортировка,
         * последовательность в которой они были в запросе игнорируется.
         *
         * Полученные комментарии отсортированы по дате создания (?) и их необходимо отсортировать исходя из $commentIds
         */

        $sorted = [];

        foreach ($commentIds as $commentId) {
            foreach ($comments as $comment) {
                if ($commentId === $comment['id']) {
                    $sorted[] = $this->factory->create($comment);
                }
            }
        }

        if (count($commentIds) !== count($sorted)) {
            throw new \RuntimeException('commentIds and sorted is not equal');
        }

        return $sorted;
    }
}
