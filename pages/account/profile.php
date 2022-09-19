<?

$id = parseIntGet('id');

$user = Model::get('user', 'user_id', $id);

if (!$user) {
    Router::location('/');
}

$activity = Model::get('user_activity', 'user_activity_id', $user['activity_id'])['name'];

function renderCountNotReadMessages() {
    global $id;

    $countNotReadMessages = Message::countNotRead($id);
    
    if (!$countNotReadMessages) {
        return;
    }

    return '<span class="messager__count">' . $countNotReadMessages . '</span>';
}
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
                                    Личный кабинет
                                </div>
                                <div class="client">
                                    <div class="application__client">
                                        <div class="client__avatar">
                                            <label class="client__img client-account <?= $user['user_id'] != $_SESSION['user']['id'] ? 'cursor-default' : '' ?>" for="user_avatar">
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
                                            <? if ($_SESSION['user']['id'] == $user['user_id']): ?>
                                                <input type="file" name="user_avatar" id="user_avatar" accept="image/png, image/jpeg" hidden>
                                            <? endif; ?>
                                            <? if ($_SESSION['user']['id'] == $user['user_id']): ?>
                                                <a class="client__contact_button button-dark" href="/chat">
                                                    <span class="account-card__button_number">
                                                        <span class="account-card__button_messager">
                                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path id="messagerSvgPath" d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="var(--default-button-third-color)" stroke-width="2" />
                                                            </svg>
                                                            <?= renderCountNotReadMessages() ?>
                                                        </span>
                                                        <span>
                                                            Сообщения
                                                        </span>
                                                    </span>
                                                </a>
                                            <? else: ?>
                                                <a class="client__contact_href" href="/chat?id=<?= $user['user_id'] ?>">
                                                    <div class="client__contact_button button-dark">
                                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path style="fill: none !important;" d="M18.4701 16.83L18.8601 19.99C18.9601 20.82 18.0701 21.4 17.3601 20.97L13.1701 18.48C12.7101 18.48 12.2601 18.45 11.8201 18.39C12.5601 17.52 13.0001 16.42 13.0001 15.23C13.0001 12.39 10.5401 10.09 7.50009 10.09C6.34009 10.09 5.2701 10.42 4.3801 11C4.3501 10.75 4.34009 10.5 4.34009 10.24C4.34009 5.68999 8.29009 2 13.1701 2C18.0501 2 22.0001 5.68999 22.0001 10.24C22.0001 12.94 20.6101 15.33 18.4701 16.83Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path style="fill: none !important;" d="M13 15.23C13 16.42 12.56 17.5201 11.82 18.3901C10.83 19.5901 9.26 20.36 7.5 20.36L4.89 21.91C4.45 22.18 3.89 21.81 3.95 21.3L4.2 19.3301C2.86 18.4001 2 16.91 2 15.23C2 13.47 2.94 11.9201 4.38 11.0001C5.27 10.4201 6.34 10.0901 7.5 10.0901C10.54 10.0901 13 12.39 13 15.23Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span>
                                                            Написать сообщение
                                                        </span>
                                                    </div>
                                                </a>
                                            <? endif; ?>
                                        </div>
                                        <div class="client__inner client__inner_first block-default">
                                            <ul class="client-data__list">
                                                <? if ($user['name']) : ?>
                                                    <li class="client-data__item">
                                                        <div class="client-data__name">
                                                            ФИО
                                                        </div>
                                                        <div class="client-data__value">
                                                            <?= $user['name'] ?>
                                                        </div>
                                                    </li>
                                                <? endif; ?>
                                                <? if ($user['telephone']) : ?>
                                                    <li class="client-data__item">
                                                        <div class="client-data__name">
                                                            Телефон
                                                        </div>
                                                        <div class="client-data__value">
                                                            <?= $user['telephone'] ?>
                                                        </div>
                                                    </li>
                                                <? endif; ?>
                                                <? if ($user['email']) : ?>
                                                    <li class="client-data__item">
                                                        <div class="client-data__name">
                                                            E-mail
                                                        </div>
                                                        <div class="client-data__value">
                                                            <?= $user['email'] ?>
                                                        </div>
                                                    </li>
                                                <? endif; ?>
                                                <li class="client-data__item">
                                                    <div class="client-data__name">
                                                        Страна
                                                    </div>
                                                    <div class="client-data__value">
                                                        Украина
                                                    </div>
                                                </li>
                                                <li class="client-data__item">
                                                    <div class="client-data__name">
                                                        Город
                                                    </div>
                                                    <div class="client-data__value">
                                                        Луганск
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="client__inner client__inner_second block-default">
                                        <div class="client__title">
                                            О компании
                                        </div>
                                        <ul class="client-data__list">
                                            <? if ($user['organization']) : ?>
                                                <li class="client-data__item">
                                                    <div class="client-data__name">
                                                        Название
                                                    </div>
                                                    <div class="client-data__value">
                                                        <?= $user['organization'] ?>
                                                    </div>
                                                </li>
                                            <? endif; ?>
                                            <li class="client-data__item">
                                                <div class="client-data__name">
                                                    ИНН
                                                </div>
                                                <div class="client-data__value">
                                                    6449013711
                                                </div>
                                            </li>
                                            <? if ($user['additional_telephone']) : ?>
                                                <li class="client-data__item">
                                                    <div class="client-data__name">
                                                        Дополнительные контакты
                                                    </div>
                                                    <div class="client-data__value">
                                                        <?= $user['additional_telephone'] ?>
                                                    </div>
                                                </li>
                                            <? endif; ?>
                                            <li class="client-data__item">
                                                <div class="client-data__name">
                                                    Сайт
                                                </div>
                                                <div class="client-data__value">
                                                    www.piptransit.ua
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                            <div class="my-application__content">
                                <div class="my-application__content_inner block-default">
                                    <div class="account__page-title page-title">
                                        Мои грузы
                                    </div>
                                    <ul class="table__service my-application__list my_cargo__list block-default"></ul>
                                </div>
                                <div class="my-application__content_inner block-default">
                                    <div class="account__page-title page-title">
                                        Мой транспорт
                                    </div>
                                    <ul class="table__service my-application__list my_transport__list block-default"></ul>
                                </div>
                                <div class="my-application__content_inner block-default">
                                    <div class="account__page-title page-title">
                                        Автопарк
                                    </div>
                                    <ul class="fleet__list">
                                        <li class="fleet__item car">
                                            <div class="car__slider">
                                                <ul class="car__images">
                                                    <li class="car__image">
                                                        <img class="car__image" src="./source/upload/car.png" alt="">
                                                    </li>
                                                </ul>
                                                <ul class="car__slider__switches">
                                                    <li class="car__slider_switch _active"></li>
                                                    <li class="car__slider_switch"></li>
                                                    <li class="car__slider_switch"></li>
                                                    <li class="car__slider_switch"></li>
                                                </ul>
                                            </div>
                                            <div class="car__text">
                                                <div class="car__title">
                                                    КамАЗ Евро 6 (2022)
                                                </div>
                                                <div class="car__type">
                                                    Самосвал
                                                </div>
                                                <div class="car__location">
                                                    <svg width="0.75rem" height="0.875rem" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.07242 0C4.6212 0 3.22942 0.589996 2.20325 1.6402C1.17708 2.6904 0.600586 4.11477 0.600586 5.59998C0.600586 9.37997 5.42264 13.65 5.62784 13.832C5.75173 13.9404 5.90939 14 6.07242 14C6.23545 14 6.39312 13.9404 6.51701 13.832C6.7564 13.65 11.5443 9.37997 11.5443 5.59998C11.5443 4.11477 10.9678 2.6904 9.9416 1.6402C8.91543 0.589996 7.52364 0 6.07242 0ZM6.07242 12.355C4.61555 10.955 1.96854 7.93797 1.96854 5.59998C1.96854 4.48608 2.40092 3.41779 3.17054 2.63014C3.94017 1.84249 4.98401 1.4 6.07242 1.4C7.16084 1.4 8.20468 1.84249 8.9743 2.63014C9.74393 3.41779 10.1763 4.48608 10.1763 5.59998C10.1763 7.93797 7.5293 10.962 6.07242 12.355ZM6.07242 2.79999C5.53131 2.79999 5.00235 2.96421 4.55243 3.27187C4.10251 3.57954 3.75184 4.01684 3.54476 4.52847C3.33769 5.0401 3.28351 5.60309 3.38907 6.14623C3.49464 6.68938 3.75521 7.18829 4.13784 7.57987C4.52046 7.97146 5.00795 8.23813 5.53867 8.34617C6.06939 8.45421 6.61949 8.39876 7.11941 8.18684C7.61934 7.97491 8.04663 7.61603 8.34725 7.15557C8.64788 6.69512 8.80834 6.15377 8.80834 5.59998C8.80834 4.85738 8.52009 4.14519 8.00701 3.62009C7.49392 3.09499 6.79803 2.79999 6.07242 2.79999ZM6.07242 6.99998C5.80187 6.99998 5.53738 6.91787 5.31242 6.76404C5.08747 6.6102 4.91213 6.39155 4.80859 6.13574C4.70505 5.87992 4.67796 5.59843 4.73075 5.32686C4.78353 5.05528 4.91382 4.80583 5.10513 4.61004C5.29644 4.41424 5.54019 4.28091 5.80555 4.22689C6.0709 4.17287 6.34596 4.20059 6.59592 4.30655C6.84588 4.41252 7.05953 4.59196 7.20984 4.82219C7.36015 5.05241 7.44038 5.32309 7.44038 5.59998C7.44038 5.97128 7.29626 6.32738 7.03971 6.58993C6.78317 6.85248 6.43523 6.99998 6.07242 6.99998Z" fill="var(--default-color)"/>
                                                    </svg>
                                                    <span>
                                                        Москва
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
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