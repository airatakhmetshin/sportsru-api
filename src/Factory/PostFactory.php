<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\Post;
use SportsruApi\Entity\Type\AuthorType;
use SportsruApi\Entity\Type\BlogType;

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
        if (isset($post['feed_image']['link'])) $postEntity->setImageUrl($post['feed_image']['link']);
        $postEntity->setId($post['id']);
        if ($post['media_src']) $postEntity->setMediaSrc($post['media_src']);
        $postEntity->setMobileUrl($post['mobile_url']);
        $postEntity->setPublishedAt((new \DateTime())->setTimestamp($post['published']['timestamp']));
        $postEntity->setRatingMinus($post['rating']['minus']);
        $postEntity->setRatingPlus($post['rating']['plus']);
        $postEntity->setTitle($post['title']);
        $postEntity->setUgcMaterial($post['ugc_material']);

        return $postEntity;
    }
}
