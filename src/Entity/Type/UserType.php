<?php

namespace SportsruApi\Entity\Type;

class UserType
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $img;

    /** @var int */
    private $rating;

    /** @var int */
    private $stars;

    /** @var int */
    private $accountVerified;

    /** @var int */
    private $accountBlocked;

    /**
     * UserType constructor.
     * @param array $user
     */
    public function __construct(array $user)
    {
        $this->setId($user['id']);
        $this->setName($user['name']);
        $this->setAccountBlocked($user['account_blocked']);

        if (isset($user['img'])) {
            $this->setImg($user['img']);
        }

        if (isset($user['rating'])) {
            $this->setRating($user['rating']);
        }

        if (isset($user['stars'])) {
            $this->setStars($user['stars']);
        }

        if (isset($user['account_verified'])) {
            $this->setAccountVerified($user['account_verified']);
        }
    }

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
    private function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    private function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    private function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    private function setStars(int $stars): void
    {
        $this->stars = $stars;
    }

    /**
     * @return int
     */
    public function getAccountVerified(): int
    {
        return $this->accountVerified;
    }

    /**
     * @param int $accountVerified
     */
    private function setAccountVerified(int $accountVerified): void
    {
        $this->accountVerified = $accountVerified;
    }

    /**
     * @return int
     */
    public function getAccountBlocked(): int
    {
        return $this->accountBlocked;
    }

    /**
     * @param int $accountBlocked
     */
    private function setAccountBlocked(int $accountBlocked): void
    {
        $this->accountBlocked = $accountBlocked;
    }
}
