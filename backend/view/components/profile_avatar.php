<label class="user-info__image" for="user_avatar">
    <? if ($user['avatar']) : ?>
        <img src="./view/upload/" alt="<?= $user['name'] . " " . $user['surname'] ?>">
    <? else : ?>
        <img src="./view/static/img/no-avatar.png" alt="Нет фото">
    <? endif ?>
    <? if ($user['user_id'] == $_SESSION['user']['user_id']) : ?>
        <input type="file" id="user_avatar" hidden>
    <? endif ?>
</label>