<?
if (!$_SESSION['user']['id']) {
    Router::location('/');
}

$user = Model::get('user', 'user_id', $_SESSION['user']['id']);
$activity = Model::get('user_activity', 'user_activity_id', $user['activity_id'])['name'];
?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Мои заявки") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Мои заявки") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <div class="profile account">
                        <?= renderNavigationTop() ?>

                        <div class="my-application">
                            <form class="my-application__account__card account-card" method="POST" enctype="multipart/form-data">
                                <div class="account__page-title page-title">
                                    Визитка
                                </div>
                                <div class="account-card__inner block-default">
                                    <label class="account-card__image" for="user_avatar">
                                        <div class="account-card__image-add">
                                            <div class="account-card__image-add_plus">+</div>
                                            <div class="account-card__image-add_text">
                                                Добавить логотип
                                            </div>
                                        </div>
                                        <input type="file" name="user_avatar" id="user_avatar" accept="image/png, image/jpeg" hidden>
                                    </label>
                                    <div class="account-card__organization">
                                        <?= $user['organization'] ? $user['organization'] : $user['name'] ?>
                                    </div>
                                    <div class="account-card__activity">
                                        <?= $activity ?>
                                    </div>
                                    <div class="account-card__buttons">
                                        <button class="account-card__button button-grey">
                                            <?= $user['telephone'] ?>
                                        </button>
                                        <button class="account-card__button button-dark">
                                            Сообщения
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="my-application__content">
                                <div class="my-application__content_inner">
                                    <div class="account__page-title page-title">
                                        Мои грузы
                                    </div>
                                    <ul class="table__service my-application__list my_cargo__list">
                                        
                                    </ul>
                                </div>
                                <div class="my-application__content_inner">
                                    <div class="account__page-title page-title">
                                        Мой транспорт
                                    </div>
                                    <ul class="table__service my-application__list my_transport__list">
                                        
                                    </ul>
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