<?php include __DIR__ . '/../header.php'; ?>
<form method="POST" action="/comments/<?= $comment->getId() ?>/update">
    <label for="comment">Комментарий</label>
    <input name="text" value="<?= $comment->getText() ?>" type="text" required="required">
    <button type="submit">Сохранить</button>
</form>
<?php include __DIR__ . '/../footer.php'; ?>
