<?php

namespace SportsruApi\Entity;

use SportsruApi\Entity\Type\UserType;

class Comment
{
    /** @var int */
    private $id;

    /** @var UserType */
    private $user;

    /** @var string */
    private $text;

    /** @var array */
    private $messageInfo;

    /** @var Comment */
    private $answerTo;

    /** @var int */
    private $ratingMinus;

    /** @var int */
    private $ratingPlus;

    /** @var string */
    private $sourceType;

    /** @var bool */
    private $editable;

    /** @var bool */
    private $voteable;

    /** @var \DateTimeInterface */
    private $createdAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return UserType
     */
    public function getUser(): UserType
    {
        return $this->user;
    }

    /**
     * @param UserType $user
     */
    public function setUser(UserType $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return array
     */
    public function getMessageInfo(): array
    {
        return $this->messageInfo;
    }

    /**
     * @param array $messageInfo
     */
    public function setMessageInfo(array $messageInfo): void
    {
        $this->messageInfo = $messageInfo;
    }

    /**
     * @return Comment
     */
    public function getAnswerTo(): ?Comment
    {
        return $this->answerTo;
    }

    /**
     * @param Comment $comment
     */
    public function setAnswerTo(Comment $comment): void
    {
        $this->answerTo = $comment;
    }

    /**
     * @return int
     */
    public function getRatingMinus(): int
    {
        return $this->ratingMinus;
    }

    /**
     * @param int $ratingMinus
     */
    public function setRatingMinus(int $ratingMinus): void
    {
        $this->ratingMinus = $ratingMinus;
    }

    /**
     * @return int
     */
    public function getRatingPlus(): int
    {
        return $this->ratingPlus;
    }

    /**
     * @param int $ratingPlus
     */
    public function setRatingPlus(int $ratingPlus): void
    {
        $this->ratingPlus = $ratingPlus;
    }

    /**
     * @return int
     */
    public function getRatingTotal(): int
    {
        return $this->ratingPlus - $this->ratingMinus;
    }

    /**
     * @return string|null
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * @param string $sourceType
     */
    public function setSourceType(string $sourceType): void
    {
        $this->sourceType = $sourceType ?: null;
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->editable;
    }

    /**
     * @param bool $editable
     */
    public function setEditable(bool $editable): void
    {
        $this->editable = $editable;
    }

    /**
     * @return bool
     */
    public function isVoteable(): bool
    {
        return $this->voteable;
    }

    /**
     * @param bool $voteable
     */
    public function setVoteable(bool $voteable): void
    {
        $this->voteable = $voteable;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
