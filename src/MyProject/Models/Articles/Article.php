<?php

namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected $name;

    protected $text;

    protected $authorId;

    protected $createdAt;

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return User::getById($this->authorId);
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }
    public function setName($name): void
    {
        $this->name = $name;
    }
    public function setText($text): void
    {
        $this->text = $text;
    }
}
