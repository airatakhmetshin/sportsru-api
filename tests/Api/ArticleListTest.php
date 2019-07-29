<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SportsruApi\Api\ArticleList;
use SportsruApi\HttpClient;

final class ArticleListTest extends TestCase
{
    public function testGetAllWithValidResponse(): void
    {
        $fakeHttpClient = new class extends HttpClient {
            public function request(string $url): HttpClient
            {
                $this->response = <<<'EOT'
                {
                   "last_published" : 946684800,
                   "documents" : [
                      {
                         "section" : {
                            "mobile_url" : "https://m.sports.ru/automoto/",
                            "genitive_name" : "авто/мото",
                            "name" : "Авто",
                            "url" : "https://www.sports.ru/automoto/",
                            "id" : 100,
                            "parent_id" : 100,
                            "webname" : "automoto"
                         },
                         "id" : 1010101010,
                         "feature" : "QQQWWWEEE",
                         "comments_count" : 10,
                         "calc_stat" : false,
                         "mobile_url" : "https://m.sports.ru/tribuna/blogs/test/100.html",
                         "comments_disabled" : false,
                         "title" : "QQQWWWEEE",
                         "images" : {
                            "mainbig" : {
                               "width" : "1050",
                               "link" : "https://s5o.sports.ru/storage/simple/ru/edt/10/10/10/1d/test10.jpg",
                               "height" : "400",
                               "alt" : ""
                            },
                            "head" : {
                               "alt" : "",
                               "height" : "260",
                               "width" : "460",
                               "link" : "https://s5o.sports.ru/storage/simple/ru/edt/10/10/10/d1/test10.jpg"
                            },
                            "headsmall" : {
                               "link" : "https://s5o.sports.ru/storage/simple/ru/edt/10/d1/1f/11/test10.jpg",
                               "width" : "200",
                               "height" : "130",
                               "alt" : ""
                            }
                         },
                         "ugc_material" : false,
                         "main": false,
                         "special_without_feed" : false,
                         "special" : false,
                         "advert_material" : false,
                         "published" : {
                            "akhmatova" : "1 месяц назад",
                            "date" : "01.01.2000",
                            "type" : "datetime",
                            "full_day_of_week" : "Воскресенье",
                            "bulgakov" : "1 января 2000, 00:00",
                            "time" : "00:00",
                            "short_date" : "00.00",
                            "year" : 2000,
                            "timestamp" : 946684800,
                            "tolstoy" : "1 января 2000, 00:00",
                            "bunin" : "1 января 2000, 00:00",
                            "short_day_of_week" : "вс",
                            "full" : "2000-01-01 00:00:00"
                         },
                         "feed_image" : {
                            "alt" : "",
                            "link" : "https://s5o.ru/storage/simple/ru/edt/10/10/10/d1/test10.jpg",
                            "width" : "460",
                            "height" : "260"
                         },
                         "partner_material" : false,
                         "article_type" : "common",
                         "desktop_url" : "https://www.sports.ru/tribuna/blogs/test/100.html",
                         "image" : {
                            "link" : "https://s5o.ru/storage/simple/ru/edt/10/10/10/d1/test10.jpg",
                            "width" : "460",
                            "height" : "260"
                         }
                      }
                   ],
                   "has_more_documents" : true
                }
EOT;

                return $this;
            }
        };

        $articleList = new ArticleList($fakeHttpClient);
        $articles = $articleList->getAll('automoto', 1);

        $this->assertInstanceOf(\SportsruApi\Entity\Article::class, $articles[0]);
    }
}
