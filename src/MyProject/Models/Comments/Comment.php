<?php

namespace MyProject\Models\Comments;
use MyProject\Models\Users\User;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;

class Comment extends ActiveRecordEntity
{
    protected $authorId;
    protected $articleId;
    protected $commentId;
    protected $text;

    public function getText(): string
    {
        return $this->text;
    }

    public function getCommentId()
    {
        return $this->commentId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getArticleId(): string
    {
        return $this->articleId;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }
}

?>
