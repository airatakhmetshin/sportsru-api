<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\Article;
use SportsruApi\Entity\Type\SectionType;

class ArticleFactory
{
    /**
     * @param array $article
     * @return Article
     * @throws \Exception
     */
    public function create(array $article): Article
    {
        $articleEntity = new Article();
        $articleEntity->setCommentsCount($article['comments_count']);
        $articleEntity->setDesktopUrl($article['desktop_url']);
        $articleEntity->setFeature($article['feature']);
        $articleEntity->setId($article['id']);
        $articleEntity->setImageUrl($article['image']['link']);
        $articleEntity->setMobileUrl($article['mobile_url']);
        $articleEntity->setPublishedAt((new \DateTime())->setTimestamp($article['published']['timestamp']));
        $articleEntity->setSection(new SectionType($article['section']));
        $articleEntity->setTitle($article['title']);
        $articleEntity->setUgcMaterial($article['ugc_material']);

        if (isset($article['images']['mainbig']['link'])) {
            $articleEntity->setBigImageUrl($article['images']['mainbig']['link']);
        }

        return $articleEntity;
    }
}
