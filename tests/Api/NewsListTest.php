<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SportsruApi\Api\NewsList;
use SportsruApi\HttpClient;

final class NewsListTest extends TestCase
{
    public function testGetAllWithValidResponse(): void
    {
        $fakeHttpClient = new class extends HttpClient {
            public function request(string $url): HttpClient
            {
                $this->response = <<<'EOT'
                [
                   {
                      "comments_count" : 1,
                      "advert_material" : false,
                      "mobile_url" : "https://m.sports.ru/boxing/1010101010.html",
                      "section" : {
                         "mobile_url" : "https://m.sports.ru/boxing/",
                         "parent_id" : 101,
                         "url" : "https://www.sports.ru/boxing/",
                         "id" : 101,
                         "webname" : "boxing",
                         "genitive_name" : "бокса",
                         "name" : "Бокс/MMA/UFC"
                      },
                      "desktop_url" : "https://www.sports.ru/boxing/1010101010.html",
                      "published" : {
                         "year" : 2000,
                         "short_date" : "01.01",
                         "tolstoy" : "1 января, 00:00",
                         "full_day_of_week" : "Понедельник",
                         "bunin" : "1 января, 00:00",
                         "full" : "2000-01-01 00:00:00",
                         "akhmatova" : "1 месяц назад",
                         "date" : "01.01.2000",
                         "timestamp" : 946684800,
                         "short_day_of_week" : "пн",
                         "type" : "datetime",
                         "time" : "00:00",
                         "bulgakov" : "1 января 2000, 00:00"
                      },
                      "image" : "https://s5o.ru/storage/simple/ru/edt/10/10/1f/10/qqq1qqqq10101.jpg",
                      "comments_disabled" : false,
                      "main" : false,
                      "media_type" : "none",
                      "main_in_section" : true,
                      "calc_stat" : false,
                      "body_is_empty" : false,
                      "content_origin" : "editorial",
                      "special_without_feed" : false,
                      "title" : "QQQWWWEEE",
                      "special" : false,
                      "social_image" : {
                         "alt" : "",
                         "height" : "409",
                         "link" : "https://s5o.ru/storage/simple/ru/edt/10/10/1f/10/qqq1qqqq10101.jpg",
                         "id" : "10101010",
                         "width" : "720"
                      },
                      "source" : {
                         "title" : "QQQWWWEEE",
                         "url" : "https://www.instagram.com/p/10101010101/"
                      },
                      "id" : 1010101010,
                      "partner_material" : false
                   }
                ]
EOT;

                return $this;
            }
        };

        $newsList = new NewsList($fakeHttpClient);
        $news = $newsList->getAll('automoto', 1);

        $this->assertInstanceOf(\SportsruApi\Entity\News::class, $news[0]);
    }
}
