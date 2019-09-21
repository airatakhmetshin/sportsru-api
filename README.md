# SportsruApi

Библиотека для работы с неоффициальным API [Sports.ru](https://www.sports.ru). Разработано **ИСКЛЮЧИТЕЛЬНО** в образовательных целях.

> [Пример](https://github.com/airatakhmetshin/sports-web) использования библиотеки в виде веб-приложения (в процессе доработки).

## Установка

```
composer config repositories.sportsru-api vcs https://github.com/airatakhmetshin/sportsru-api
composer require akhmetshin/sportsru-api:dev-master
```

## Использование

Подключаем библиотеку

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$sportsruApi = new SportsruApi\Client();
```

#### Доступные типы контента

| Тип контента | Метод                     |
| ------------ | ------------------------- |
| Новости      | `$sportsruApi->news()`    |
| Блоги        | `$sportsruApi->article()` |
| Блоги        | `$sportsruApi->post()`    |
| Комментарии  | `$sportsruApi->comment()` |

#### Доступные категории (список дополняется)

| На сайте         | Использование в API |
| ---------------- | ------------------- |
| Футбол           | football            |
| Хоккей           | hockey              |
| Баскетбол        | basketball          |
| Авто             | automoto            |
| Теннис           | tennis              |
| Бокс/ММА/UFC     | boxing              |
| Фигурное катание | figure-skating      |
| Биатлон          | biathlon            |
| Водные виды      | aquatics            |

#### Выборки новостей
1. Получить выборку новостей `getAll($category)`
1. Получить выборку новостей с настройкой `getAll($category, $options)`

Доступные настройки для `$options = new \SportsruApi\Api\Options\NewsListOptions()`

| Метод                          | Параметр                 |
| ------------------------------ | ------------------------ |
| `$options->setType()`          | TYPE_HOMEPAGE            |
| `$options->setType()`          | TYPE_SECTION_NAME        |
| `$options->setType()`          | TYPE_SPORT               |
| `$options->setType()`          | TYPE_TAG                 |
| `$options->setNewsType()`      | NEWS_TYPE_ALL            |
| `$options->setNewsType()`      | NEWS_TYPE_MAIN           |
| `$options->setNewsType()`      | NEWS_TYPE_SECONDARY      |
| `$options->setContentOrigin()` | CONTENT_ORIGIN_ALL       |
| `$options->setContentOrigin()` | CONTENT_ORIGIN_MIXED     |
| `$options->setContentOrigin()` | CONTENT_ORIGIN_EDITORIAL |
| `$options->setContentOrigin()` | CONTENT_ORIGIN_USER      |

#### Выборка блогов
```php
// Без указания типа
$articles = $articleApi->getAll($category);

// С указанием типа TYPE_HOMEPAGE / TYPE_SECTION_NAME
$type = $articleApi::TYPE_HOMEPAGE;
$articles = $articleApi->getAll($category, $type);
```

#### Выборка блогов (2й способ)
```php
// Без дополнительных аргументов
$posts = $postApi->getAll($category);

// С дополнительными аргументами
$count = 10;
$type = 'homepage' // или 'section-name'
$best = true;
$showAvatar = true;

$posts = $postApi->getAll($category, $count, $type, $best, $showAvatar);
```

#### Комментарии
1. Получить ID комментариев по ID и типу материала `getCommentIdsByArticle()`;
1. Получить комментарии по их ID `getCommentByIds()`.

Настройки для `getCommentIdsByArticle($articleId, $messageClass, $sort)`

Тип материала `$messageClass`

| Описание | Параметр           |
| -------- | ------------------ |
| Блоги    | MESSAGE_CLASS_BLOG |
| Новости  | MESSAGE_CLASS_NEWS |
| Опросы   | MESSAGE_CLASS_POLL |

Сортировка `$sort`

| Описание   | Параметр     |
| ---------- | ------------ |
| Новые      | SORT_NEW     |
| Старые     | SORT_OLD     |
| Лучшие     | SORT_TOP     |
| Актуальные | SORT_ACTUAL  |
| Друзья     | SORT_FRIENDS |

## Примеры выборок

#### Блок "Главные новости"
```php
// На главной странице
$newsApi = $sportsruApi->news();

$options = new \SportsruApi\Api\Options\NewsListOptions();
$options->setType($options::TYPE_HOMEPAGE);
$options->setNewsType($options::NEWS_TYPE_MAIN);
$options->setContentOrigin($options::CONTENT_ORIGIN_EDITORIAL);

$news = $newsApi->getAll(null, $options);

// На странице категории
$newsApi = $sportsruApi->news();

$options = new \SportsruApi\Api\Options\NewsListOptions();
$options->setNewsType($options::NEWS_TYPE_MAIN);
$options->setContentOrigin($options::CONTENT_ORIGIN_MIXED);

$news = $newsApi->getAll('football', $options);
```

#### Центральный блок с блогами
```php
// На главной странице
$articleApi = $sportsruApi->article();

$articles = $articleApi->getAll(null, $articleApi::TYPE_HOMEPAGE);

// На странице категории
$articleApi = $sportsruApi->article();

$articles = $articleApi->getAll('football');
```

#### Страница новостей
```php
// Редакционные новости
$newsApi = $sportsruApi->news();

$news = $newsApi->getAll('football');

// Отобранные пользовательские новости
$newsApi = $sportsruApi->news();

$options = new \SportsruApi\Api\Options\NewsListOptions();
$options->setNewsType($options::NEWS_TYPE_MAIN);
$options->setContentOrigin($options::CONTENT_ORIGIN_USER);

$news = $newsApi->getAll('football', $options);

// Свежие пользовательские новости
$newsApi = $sportsruApi->news();

$options = new \SportsruApi\Api\Options\NewsListOptions();
$options->setContentOrigin($options::CONTENT_ORIGIN_USER);

$news = $newsApi->getAll('football', $options);
```

#### Страница блогов

```php
$count = 10;
$best = true;

// Популярные
$postApi = $sportsruApi->post();
$posts = $postApi->getAll('football', $count, null, $best);

// Новые
$postApi = $sportsruApi->post();
$posts = $postApi->getAll('football', $count);
```

#### Получаем комментарии

```php
$commentApi = $sportsruApi->comment();

// Получаем ID комментариев, в качестве аргументов передаем ID и тип материала
$ids = $commentApi->getCommentIdsByArticle(1078128392, $commentApi::MESSAGE_CLASS_NEWS);

// Получаем комментарии используя их ID 
$comments = $commentApi->getCommentByIds($ids);
```
