<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <a href="<?= $article->getId() ?>/edit">Изменить статью</a><br>
    <a href="<?= $article->getId() ?>/delete">Удалить статью</a>
    <form style="display: grid; margin-top: 15px;" method="post" action="/articles/<?= $article->getId() ?>/comments">
        <lable for="comment">Добавьте комментарий:</lable>
        <input type="text" name="comment" required="required"/>
        <button style="width: 100px;" type="submit">Отправить</button>
    </form>
    <div style="margin-top: 15px;">
        Комментарии:
        <?php foreach ($comments as $comment): ?>
            <p>Автор: <?= $comment->getAuthor()->getNickname() ?></p>
            <p><?= $comment->getText() ?></p>
            <a href="/comments/<?= $comment->getId() ?>/delete">Удалить</a>
            <a href="/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
            <hr>
        <?php endforeach; ?>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>
