<?

$id = parseIntGet('id');

$user = Model::get('user', 'user_id', $id);

if (!$user) {
    Router::location('/');
}

$activity = Model::get('user_activity', 'user_activity_id', $user['activity_id'])['name'];
?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Сообщения") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Сообщения") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <div class="chat account">
                        <?= renderNavigationTop() ?>

                        <div class="my-application">
                            <div class="chat__card account-card" enctype="multipart/form-data">
                                <div class="chat__page-title account__page-title page-title">
                                    Чаты
                                </div>
                                <ul class="chat__list block-default">
                                </ul>
                            </div>
                            <div class="message__content">
                                <div class="account__page-title page-title">
                                    Сообщения
                                </div>
                                <div class="message__content_inner block-default">
                                    <div class="message__user">
                                        <div class="message__image <?= $user['is_online'] ? '_online' : '' ?>">
                                            <?= renderAvatar('header__authorization_img', 'avatar__icon', $user['avatar'], $user['name']) ?>
                                        </div>
                                        <div class="message__user_text">
                                            <div class="message__user_name">
                                                <?= $user['name'] ?>
                                            </div>
                                            <a class="message__user_link blue-link" href="/profile?id=<?= $user['user_id'] ?>">
                                                Открыть профиль
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="message__list">
                                    </ul>
                                    <div class="message__send">
                                        <input type="text" class="message__input input">
                                        <button class="message__button button-dark">Отправить</button>
                                    </div>
                                </div>
                            </div>
                            </d>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?= renderFooter() ?>
    </div>
    <? require_once './source/components/script.php' ?>
</body>

</html>