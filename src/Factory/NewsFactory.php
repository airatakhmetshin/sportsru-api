<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\News;

class NewsFactory
{
    public function create(array $news): News
    {
        $newsEntity = new News();
        $newsEntity->setCommentsCount($news['comments_count']);
        $newsEntity->setDesktopUrl($news['desktop_url']);
        $newsEntity->setId($news['id']);
        $newsEntity->setMain($news['main']);
        $newsEntity->setMainInSection($news['main_in_section']);
        $newsEntity->setMediaType($news['media_type']);
        $newsEntity->setMobileUrl($news['mobile_url']);
        $newsEntity->setPublishedAt((new \DateTime())->setTimestamp($news['published']['timestamp']));

        return $newsEntity;
    }
}
