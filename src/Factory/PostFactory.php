<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\AuthorType;
use SportsruApi\Entity\BlogType;
use SportsruApi\Entity\Post;

class PostFactory
{
    public function create(array $post): Post
    {
        $postEntity = new Post();
        foreach ($post['authors'] as $author) $postEntity->addAuthor(new AuthorType($author));
        if (isset($post['avatar'])) $postEntity->setAvatar($post['avatar']);
        $postEntity->setBlog(new BlogType($post['blog']));
        $postEntity->setBrief($post['brief']);
        $postEntity->setCommentsCount($post['comments_count']);
        $postEntity->setDesktopUrl($post['desktop_url']);
        $postEntity->setId($post['id']);
        $postEntity->setMediaSrc(urldecode($post['media_src']));
        $postEntity->setMobileUrl($post['mobile_url']);
        $postEntity->setPublishedAt((new \DateTime())->setTimestamp($post['published']['timestamp']));
        $postEntity->setRatingMinus($post['rating']['minus']);
        $postEntity->setRatingPlus($post['rating']['plus']);
        $postEntity->setTitle($post['title']);
        $postEntity->setUgcMaterial($post['ugc_material']);

        return $postEntity;
    }
}
