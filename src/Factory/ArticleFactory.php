<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\Article;
use SportsruApi\Entity\SectionType;

class ArticleFactory
{
    public function create(array $article): Article
    {
        $articleEntity = new Article();
        $articleEntity->setCommentsCount($article['comments_count']);
        $articleEntity->setDesktopUrl($article['desktop_url']);
        $articleEntity->setFeature($article['feature']);
        $articleEntity->setId($article['id']);
        $articleEntity->setMobileUrl($article['mobile_url']);
        $articleEntity->setPublishedAt((new \DateTime())->setTimestamp($article['published']['timestamp']));
        $articleEntity->setSection(new SectionType($article['section']));
        $articleEntity->setTitle($article['title']);
        $articleEntity->setUgcMaterial($article['ugc_material']);

        return $articleEntity;
    }
}
