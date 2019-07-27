<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\Post;
use SportsruApi\Entity\Type\AuthorType;
use SportsruApi\Entity\Type\BlogType;

class PostFactory
{
    /**
     * @param array $post
     * @return Post
     * @throws \Exception
     */
    public function create(array $post): Post
    {
        $postEntity = new Post();
        $postEntity->setBlog(new BlogType($post['blog']));
        $postEntity->setBrief($post['brief']);
        $postEntity->setCommentsCount($post['comments_count']);
        $postEntity->setDesktopUrl($post['desktop_url']);
        $postEntity->setId($post['id']);
        $postEntity->setMobileUrl($post['mobile_url']);
        $postEntity->setPublishedAt((new \DateTime())->setTimestamp($post['published']['timestamp']));
        $postEntity->setRatingMinus($post['rating']['minus']);
        $postEntity->setRatingPlus($post['rating']['plus']);
        $postEntity->setTitle($post['title']);
        $postEntity->setUgcMaterial($post['ugc_material']);

        foreach ($post['authors'] as $author) {
            $postEntity->addAuthor(new AuthorType($author));
        }

        if (isset($post['avatar'])) {
            $postEntity->setAvatar($post['avatar']);
        }

        if (isset($post['feed_image']['link'])) {
            $postEntity->setImageUrl($post['feed_image']['link']);
        }

        if ($post['media_src']) {
            $postEntity->setMediaSrc($post['media_src']);
        }

        return $postEntity;
    }
}
