<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SportsruApi\Api\PostList;
use SportsruApi\HttpClient;

final class PostListTest extends TestCase
{
    public function testGetAllWithValidResponse(): void
    {
        $fakeHttpClient = new class extends HttpClient {
            public function request(string $url): HttpClient
            {
                $this->response = <<<'EOT'
                {
                   "last_published" : 946684800,
                   "has_more_documents" : true,
                   "documents" : [
                      {
                         "is_draft" : false,
                         "desktop_url" : "https://www.sports.ru/tribuna/blogs/wwwqqqeee/1010101.html",
                         "comments_count" : 10,
                         "is_hidden" : false,
                         "special" : false,
                         "blog" : {
                            "name" : "QQQWWWEEE",
                            "avatar" : "https://s5o.ru/storage/1010/1/1/1010101010/1010101010.101010_10.jpg",
                            "subscribers_count" : 101,
                            "subtitle" : "QQQWWWEEE.",
                            "id" : 10101,
                            "posts_count" : 101,
                            "access" : "closed",
                            "last_post_date" : {
                               "full" : "2000-01-01",
                               "bulgakov" : "1 января 2000",
                               "short_day_of_week" : "пт",
                               "date" : "01.01.2000",
                               "tolstoy" : "1 января",
                               "full_day_of_week" : "Пятница",
                               "short_date" : "01.01",
                               "year" : 2000,
                               "bunin" : "1 января",
                               "type" : "date",
                               "lermontov" : "1 января"
                            },
                            "url" : "https://www.sports.ru/tribuna/blogs/qqqwwweee/",
                            "mobile_url" : "https://m.sports.ru/tribuna/blogs/qqqwwweee/"
                         },
                         "smart_brief" : "QQQWWWEEE.",
                         "id" : 1010101,
                         "feed_image" : {},
                         "authors" : [
                            {
                               "id" : 1010101010,
                               "url" : "https://www.sports.ru/profile/1010101010/",
                               "friend_of_count" : 10,
                               "gender" : "male",
                               "name" : "qqqwwweee"
                            }
                         ],
                         "avatar" : "https://s5o.ru/storage/simple/ru/edt/c1/1e/1f/10/qqqq1qq1010e1.png",
                         "branded" : false,
                         "special_without_feed" : false,
                         "brief" : "QQQWWWEEE.",
                         "mobile_url" : "https://m.sports.ru/tribuna/blogs/qqqwwweee/1010101.html",
                         "media_src" : "https://cdn.tribuna.com/fetch/?url=http%3A%2F%2Fss.sport-express.ru%2Fuserfiles%2Fmaterials%2F56%2F561023%2Flarge.jpg",
                         "advert_material" : false,
                         "rating" : {
                            "minus" : 1,
                            "total" : 101,
                            "disabled" : false,
                            "ended" : false,
                            "plus" : 101
                         },
                         "ugc_material" : false,
                         "published" : {
                            "akhmatova" : "1 месяц назад",
                            "tolstoy" : "1 января 2000, 00:00",
                            "short_day_of_week" : "пн",
                            "date" : "01.01.2000",
                            "bulgakov" : "1 января 2000, 00:00",
                            "full" : "2000-01-01 00:00:00",
                            "type" : "datetime",
                            "bunin" : "1 января 2000, 00:00",
                            "year" : 2000,
                            "short_date" : "01.01",
                            "timestamp" : 946684800,
                            "full_day_of_week" : "Понедельник",
                            "time" : "00:00"
                         },
                         "comments_disabled" : false,
                         "partner_material" : false,
                         "media" : "<img src=\"https://cdn.tribuna.com/fetch/?url=http%3A%2F%2Fss.sport-express.ru%2Fuserfiles%2Fmaterials%2F10%2F101010%2Flarge.jpg\">",
                         "title" : "QQQWWWEEE"
                      }
                   ]
                }
EOT;

                return $this;
            }
        };

        $postList = new PostList($fakeHttpClient);
        $posts = $postList->getAll('automoto', 1);

        $this->assertInstanceOf(\SportsruApi\Entity\Post::class, $posts[0]);
    }
}
