<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Models\Comments\Comment;

class ArticlesController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);
        $comments = Comment::getByArticleId($articleId);
        $reflector = new \ReflectionObject($article);
        $properties = $reflector->getProperties();
        $propertiesNames = [];
        foreach ($properties as $property) {
            $propertiesNames[] = $property->getName();
        }

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'comments' => $comments,
        ]);
    }
    public function edit(int $articleId): void
    {
        /** @var Article $article */
        $article = Article::getById($articleId);
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $article->setName("Измененно название статьи {$articleId}");
        $article->setText('Измененный текст статьи');
        $article->save();
        header('Location: http://localhost:80/');
    }
    public function add(): void
    {
        $author = User::getById(1);
        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');
        $article->save();
        header('Location: http://localhost:80/');
    }
    public function delete(int $articleId): void
    {
        /** @var Article $article */
        $article = Article::getById($articleId);
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $article->delete();
        header('Location: http://localhost:80/');
    }
}
