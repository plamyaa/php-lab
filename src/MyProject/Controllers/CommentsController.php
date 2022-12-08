<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Models\Comments\Comment;

class CommentsController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function update(int $commentId)
    {
        if ($_POST !== null) {
            /** @var Comment $comment */
            $comment = Comment::getById($commentId);
            $comment->setText($_POST['text']);
            $comment->save();
        }
        header(
            'Location: http://localhost/articles/' . $comment->getArticleId()
        );
    }

    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('comments/edit.php', [
            'comment' => $comment,
        ]);
    }
    public function add(int $articleId)
    {
        if (!empty($_POST)) {
            $author = User::getById(1);
            $comment = new Comment();
            $comment->setAuthor($author);
            $comment->setArticleId($articleId);
            $comment->setText($_POST['comment']);
            $comment->save();
        }

        header(
            'Location: http://localhost:80/articles/' . $comment->getArticleId()
        );
    }
    public function delete(int $commentId): void
    {
        /** @var Comment $article */
        $comment = Comment::getById($commentId);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $comment->delete();
        header(
            'Location: http://localhost:80/articles/' . $comment->getArticleId()
        );
    }
}
