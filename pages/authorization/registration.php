<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php'; ?>
    <title>Регистрация</title>
</head>
<body>
    <div class="wrapper">
    <?= renderHeader("Регистрация") ?>
<main class="main">
    <div class="container">
        <div class="main__container">
        <?= renderNavigationTop() ?>

            <form class="registration block-default" action="" method="POST" enctype="multipart/form-data">
                <div class="registration__page-title page-title">
                    Регистрация нового пользователя
                </div>
                <div class="registration__grid">
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_email">
                            Email адрес *
                        </label>
                        <?
                            if ($_SESSION['error_email']) {
                                echo '<input class="registration__input input error-input" type="email" placeholder="Введите почтовый ящик" id="user_email" name="user_email">
                                        <div class="error">' . $_SESSION['error_email'] . '</div>';
                                $_SESSION['error_email'] = null;
                            } else {
                                echo '<input class="registration__input input" type="email" placeholder="Введите почтовый ящик" id="user_email" name="user_email">';
                            }
                        ?>
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_telephone">
                            Телефон *
                        </label>
                        <?
                            if ($_SESSION['error_telephone']) {
                                echo '<input class="registration__input input error-input" type="tel" placeholder="Введите телефон" id="user_telephone" name="user_telephone">
                                        <div class="error">' . $_SESSION['error_telephone'] . '</div>';
                                $_SESSION['error_telephone'] = null;
                            } else {
                                echo '<input class="registration__input input" type="tel" placeholder="Введите телефон" id="user_telephone" name="user_telephone">';
                            }
                        ?>
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_login">
                            Логин *
                        </label>
                        <?
                            if ($_SESSION['error_login']) {
                                echo '<input class="registration__input input error-input" type="text" placeholder="Придумайте логин" id="user_login" name="user_login">
                                        <div class="error">' . $_SESSION['error_login'] . '</div>';
                                $_SESSION['error_login'] = null;
                            } else {
                                echo '<input class="registration__input input" type="text" placeholder="Придумайте логин" id="user_login" name="user_login">';
                            }
                        ?>
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_name">
                            Имя *
                        </label>
                        <input class="registration__input input" type="text" placeholder="Введите имя" id="user_name" name="user_name">
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_password">
                            Пароль *
                        </label>
                        <?
                            if ($_SESSION['error_password']) {
                                echo '<input class="registration__input input error-input" type="password" placeholder="Придумайте пароль" id="user_password" name="user_password">
                                        <div class="error">' . $_SESSION['error_password'] . '</div>';
                                $_SESSION['error_password'] = null;
                            } else {
                                echo '<input class="registration__input input" type="password" placeholder="Придумайте пароль" id="user_password" name="user_password">';
                            }
                        ?>
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_password_confirm">
                            Подтвердите пароль *
                        </label>
                        <input class="registration__input input" type="password" placeholder="Введите пароль ещё раз" id="user_password_confirm" name="user_password_confirm">
                    </div>
                </div>
                <div class="registration__profile">
                    <div class="registration__page-title page-title">
                        Заполнение профиля
                    </div>
                    <span>
                        (Необязательно)
                    </span>
                </div>
                <div class="registration__grid">
                    <div class="registration__textarea-form textarea-form">
                        <label class="laber__for-textarea" for="user_about">
                            Обо мне
                        </label>
                        <textarea class="registration__textarea textarea" type="text" placeholder="Начните вводить текст" id="user_about" name="user_about"></textarea>
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="select">
                            Вид деятельности
                        </label>
                        <div class="_select">
                            <div class="_select__block">
                                <input type="text" class="_select__show input" id="select" placeholder="Выберите из списка" disabled>
                                <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                </svg>                            
                            </div>
                            <ul class="_select__list">
                                <? foreach(UserActivityController::getAll() as $activity) {
                                    echo '<li class="_select__item">
                                            <label for="activity' . $activity["user_activity_id"] . '">
                                            ' . $activity["name"] . '
                                                <input name="user_activity" type="radio" value="' . $activity["user_activity_id"] . '" id="activity' . $activity["user_activity_id"] . '" hidden>
                                            </label>
                                        </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_organization">
                            Название организации
                        </label>
                        <input class="registration__input input" type="text" placeholder="Введите если есть" id="user_organization" name="user_organization">
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_telephone_second">
                            Дополнительный телефон
                        </label>
                        <input class="registration__input input" type="tel" placeholder="Введите телефон" id="user_telephone_second" name="user_telephone_second">
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_viber">
                            Viber
                        </label>
                        <input class="registration__input input" type="text" placeholder="Введите если есть" id="user_viber" name="user_viber">
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_whatsapp">
                            WhatsApp
                        </label>
                        <input class="registration__input input" type="text" placeholder="Введите если есть" id="user_whatsapp" name="user_whatsapp">
                    </div>
                    <div class="registration__input-form input-form">
                        <label class="label__for-input" for="user_telegram">
                            Telegram
                        </label>
                        <input class="registration__input input" type="text" placeholder="Введите если есть" id="user_telegram" name="user_telegram">
                    </div>
                </div>
                <div class="registration__input-form_file input-form">
                    <label class="label__for-input" for="user_password_confirm">
                        Свидетельство о регистрации
                    </label>
                    <label class="registration__input-file input-file" for="file">
                        <input type="file" id="file" name="user_certificate" hidden>
                        <div class="button-dark input-file__button">
                            <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 6.94C0.0110664 6.84813 0.0324364 6.75763 0.0637493 6.67V6.58C0.114836 6.47718 0.18298 6.38267 0.265625 6.3L6.64062 0.3C6.72846 0.222216 6.82888 0.158081 6.93812 0.11H7.03375C7.14168 0.0517412 7.26089 0.0143442 7.38437 0H13.8125C14.6579 0 15.4686 0.316071 16.0664 0.87868C16.6642 1.44129 17 2.20435 17 3V17C17 17.7956 16.6642 18.5587 16.0664 19.1213C15.4686 19.6839 14.6579 20 13.8125 20H3.1875C2.34212 20 1.53137 19.6839 0.933598 19.1213C0.335825 18.5587 0 17.7956 0 17V7C0 7 0 7 0 6.94ZM6.375 3.41L3.62313 6H5.3125C5.59429 6 5.86454 5.89464 6.0638 5.70711C6.26306 5.51957 6.375 5.26522 6.375 5V3.41ZM2.125 17C2.125 17.2652 2.23694 17.5196 2.4362 17.7071C2.63546 17.8946 2.90571 18 3.1875 18H13.8125C14.0943 18 14.3645 17.8946 14.5638 17.7071C14.7631 17.5196 14.875 17.2652 14.875 17V3C14.875 2.73478 14.7631 2.48043 14.5638 2.29289C14.3645 2.10536 14.0943 2 13.8125 2H8.5V5C8.5 5.79565 8.16418 6.55871 7.5664 7.12132C6.96863 7.68393 6.15788 8 5.3125 8H2.125V17Z" fill="white"/>
                            </svg>                                    
                            <span>
                                Добавить файл
                            </span>
                        </div>
                    </label>
                </div>
                <button class="registration__button button-yellow" name="registration_button">
                    Регистрация
                </button>
            </form>
        </div>
    </div>
</main>
            <?= renderFooter() ?>
        </div>
        <? require_once './source/components/script.php' ?>
    </body>
</html>