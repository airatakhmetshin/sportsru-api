<?php

namespace SportsruApi\Factory;

use SportsruApi\Entity\Comment;
use SportsruApi\Entity\Type\UserType;

class CommentFactory
{
    /**
     * @param array $comment
     * @return Comment
     * @throws \Exception
     */
    public function create(array $comment): Comment
    {
        $commentEntity = new Comment();

        $commentEntity->setId($comment['id']);
        $commentEntity->setUser(new UserType($comment['user']));
        $commentEntity->setText($comment['text']);

        if (isset($comment['message_info'])) {
            $commentEntity->setMessageInfo($comment['message_info']);
        }

        if (isset($comment['rating']['minus'])) {
            $commentEntity->setRatingMinus($comment['rating']['minus']);
        }

        if (isset($comment['rating']['plus'])) {
            $commentEntity->setRatingPlus($comment['rating']['plus']);
        }

        if (isset($comment['source_type'])) {
            $commentEntity->setSourceType($comment['source_type']);
        }

        if (isset($comment['editable'])) {
            $commentEntity->setEditable($comment['editable']);
        }

        if (isset($comment['voteable'])) {
            $commentEntity->setVoteable($comment['voteable']);
        }

        if (isset($comment['c_time'])) {
            $commentEntity->setCreatedAt((new \DateTime())->setTimestamp($comment['c_time']));
        }

        if (isset($comment['answer_to'])) {
            $answerToComment = $this->create($comment['answer_to']);
            $commentEntity->setAnswerTo($answerToComment);
        }

        return $commentEntity;
    }
}
