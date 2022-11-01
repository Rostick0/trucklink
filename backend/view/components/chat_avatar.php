<a class="chat__user-image" href="profile?id=<?= $user['user_id'] ?>">
    <? if ($user['avatar']) : ?>
        <? if (file_exists("./view/upload/{$user['avatar']}")): ?>
            <img src="./view/upload/<?= $user['avatar'] ?>" alt="<?= $user['name'] . " " . $user['surname'] ?>">
        <? else:?>
            <img src="./view/static/img/no-avatar.png" alt="Нет фото">
        <? endif; ?>
    <? else : ?>
        <img src="./view/static/img/no-avatar.png" alt="Нет фото">
    <? endif ?>
</a>