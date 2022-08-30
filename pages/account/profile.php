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

<?= rendeHead("Заявки") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Заявки") ?>
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
                                    <label class="account-card__image <?= $user['user_id'] != $_SESSION['user']['id'] ? 'cursor-default' : '' ?>" for="user_avatar">
                                        <?
                                        if ($user['avatar'] && file_exists("./source/upload/" . $user['avatar'])) {
                                            echo '<img class="account-card__img" src="./source/upload/' . $user['avatar'] . '" alt="' . $user['name'] . '">';
                                            if ($user['user_id'] == $_SESSION['user']['id']) {
                                                echo '<div class="account-card__image-update">
                                                        <p>Нажмите, чтобы</p>
                                                        <p>обновить фотографию</p>
                                                    </div>';
                                            }

                                        } else {
                                            if ($user['user_id'] == $_SESSION['user']['id']) {
                                                echo '<div class="account-card__image-add">
                                                        <svg width="2rem" height="2rem" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.3337 6.66663H12.1621C11.6317 6.66663 11.1229 6.87734 10.7479 7.25241L9.25278 8.74751C8.87771 9.12258 8.369 9.33329 7.83856 9.33329H4.66699C3.56242 9.33329 2.66699 10.2287 2.66699 11.3333L2.66699 26C2.66699 27.1045 3.56242 28 4.66699 28H24.667C25.7716 28 26.667 27.1045 26.667 26V16M22.667 6.66663H30.667M26.667 10.6666V2.66663M14.667 24C17.6125 24 20.0003 21.6121 20.0003 18.6666C20.0003 15.7211 17.6125 13.3333 14.667 13.3333C11.7215 13.3333 9.33366 15.7211 9.33366 18.6666C9.33366 21.6121 11.7215 24 14.667 24Z" stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>                                       
                                                        <div class="account-card__image-add_text">
                                                            Добавить фото
                                                        </div>
                                                    </div>';
                                            }
                                        }
                                        ?>
                                    </label>
                                    <input type="file" name="user_avatar" id="user_avatar" accept="image/png, image/jpeg" hidden>
                                    <div class="account-card__organization">
                                        <?= $user['organization'] ? $user['organization'] : $user['name'] ?>
                                    </div>
                                    <div class="account-card__activity">
                                        <?= $activity ?>
                                    </div>
                                    <div class="account-card__buttons">
                                        <button class="account-card__button button-grey">
                                            <span class="account-card__button_number">
                                                <span class="account-card__button_messager">
                                                    <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path id="messagerSvgPath" d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="var(--default-button-third-color)" stroke-width="2" />
                                                    </svg>
                                                    <!-- <span class="messager__count">
                                                        1
                                                    </span> -->
                                                </span>
                                                <span>
                                                    <?= $_SESSION['user']['id'] === $id ? 'Сообщения' : 'Написать сообщение' ?>
                                                </span>
                                            </span>
                                        </button>
                                        <a href="tel:<?= $user['telephone'] ?>" class="account-card__tel">
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.0002 11C17.0002 8.79086 15.2094 7 13.0002 7M21.0002 11C21.0002 6.58172 17.4185 3 13.0002 3M17.1022 21.9752C8.98075 21.5259 2.47449 15.0196 2.02512 6.89814C1.99356 6.32773 2.24464 5.78287 2.67161 5.40333L4.54984 3.7338C5.53347 2.85946 7.07887 3.15708 7.66742 4.33419L8.35567 5.71068C8.74066 6.48066 8.58975 7.41061 7.98103 8.01933L7.58613 8.41423C7.21105 8.78931 6.98336 9.30694 7.14985 9.81057C7.94916 12.2285 11.7719 16.0512 14.1898 16.8505C14.6934 17.017 15.2111 16.7893 15.5861 16.4142L15.981 16.0193C16.5898 15.4106 17.5197 15.2597 18.2897 15.6447L19.6662 16.3329C20.8433 16.9215 21.1409 18.4669 20.2666 19.4505L18.597 21.3287C18.2175 21.7557 17.6726 22.0068 17.1022 21.9752Z" stroke="var(--default-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span>
                                                <?= $user['telephone'] ?>
                                            </span>
                                        </a>
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