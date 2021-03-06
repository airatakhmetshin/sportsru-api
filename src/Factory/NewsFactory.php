<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\News;
use SportsruApi\Entity\Type\SectionType;

class NewsFactory
{
    /**
     * @param array $news
     * @return News
     * @throws \Exception
     */
    public function create(array $news): News
    {
        $newsEntity = new News();
        $newsEntity->setCommentsCount($news['comments_count']);
        $newsEntity->setContentOrigin($news['content_origin']);
        $newsEntity->setDesktopUrl($news['desktop_url']);
        $newsEntity->setId($news['id']);
        $newsEntity->setImage($news['image']);
        $newsEntity->setMain($news['main']);
        $newsEntity->setMainInSection($news['main_in_section']);
        $newsEntity->setMediaType($news['media_type']);
        $newsEntity->setMobileUrl($news['mobile_url']);
        $newsEntity->setPublishedAt((new \DateTime())->setTimestamp($news['published']['timestamp']));
        $newsEntity->setSection(new SectionType($news['section']));
        $newsEntity->setTitle($news['title']);

        if (isset($news['source']['url'])) {
            $newsEntity->setSourceUrl($news['source']['url']);
        }

        return $newsEntity;
    }
}
