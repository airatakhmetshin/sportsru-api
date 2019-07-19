<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\Comment;

class CommentFactory
{
    public function create(array $comment): Comment
    {
        $commentEntity = new Comment();

        $commentEntity->setId($comment['id']);
        $commentEntity->setUser($comment['user']);
        $commentEntity->setText($comment['text']);
        $commentEntity->setMessageInfo($comment['message_info']);
        $commentEntity->setRatingMinus($comment['rating']['minus']);
        $commentEntity->setRatingPlus($comment['rating']['plus']);
        $commentEntity->setSourceType($comment['source_type']);
        $commentEntity->setEditable($comment['editable']);
        $commentEntity->setVoteable($comment['voteable']);
        $commentEntity->setCreatedAt((new \DateTime())->setTimestamp($comment['c_time']));

        if (isset($comment['answer_to'])) {
            $commentEntity->setAnswerTo($comment['answer_to']);
        }

        return $commentEntity;
    }
}
