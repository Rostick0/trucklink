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
                            <div class="chat__card account-card">
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
                                    <? if ($id): ?>
                                        <div class="message__user">
                                            <a class="message__image" href="/profile?id=<?= $user['user_id'] ?>">
                                                <?= renderAvatar('header__authorization_img', 'avatar__icon', $user['avatar'], $user['name']) ?>
                                            </a>
                                            <div class="message__user_text">
                                                <div class="message__user_name">
                                                    <?= $user['name'] ?>
                                                </div>
                                                <div class="message__user_online">
                                                    <?= $user['is_online'] == 1 ? 'в сети' : 'не сети' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="message__list">
                                            <date class="message__current_date">Сегодня</date>
                                        </ul>
                                        <div class="message__send">
                                            <input type="text" class="message__input input">
                                            <button class="message__button button-dark">
                                                <svg width="1.625rem" height="1.625rem" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.66654 13L5.99517 20.8797C5.95558 20.9845 5.94742 21.0982 5.97166 21.2074C5.99589 21.3166 6.05151 21.4167 6.13189 21.4957C6.21227 21.5748 6.31404 21.6295 6.42511 21.6533C6.53617 21.6771 6.65186 21.6691 6.75842 21.6302L21.1247 14.0834L21.3477 13.9662L21.5708 13.849L21.7938 13.7319C21.7938 13.7319 22.208 13.5417 22.208 13C22.208 12.4584 21.7938 12.2682 21.7938 12.2682L21.5708 12.1511L21.3477 12.0339L21.1247 11.9167L6.75842 4.36991C6.65186 4.33099 6.53617 4.32296 6.42511 4.34679C6.31404 4.37062 6.21227 4.42531 6.13189 4.50434C6.05151 4.58337 5.99589 4.68344 5.97166 4.79264C5.94742 4.90184 5.95558 5.01558 5.99517 5.12036L8.66654 13ZM8.66654 13H14.083" stroke="#FAFAFA" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>                                                    
                                            </button>
                                        </div>
                                    <? else: ?>
                                        <div class="message__no-user">Выберите диалог</div>
                                    <? endif; ?>
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