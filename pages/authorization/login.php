<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php'; ?>
    <title>Вход в личный кабинет</title>
</head>
<body>
    <div class="wrapper">
        <?= renderHeader("Вход в личный кабинет") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>
                    <form class="login block-default" action="" method="POST">
                        <div class="login__page-title page-title">
                            Вход в личный кабинет
                        </div>
                        <div class="login__inputs">
                            <div class="login__input-form input-form">
                                <label class="label__for-input" for="login">
                                    Логин
                                </label>
                                <?
                                    if ($_SESSION['authorization'][0]['type'] === 'login') {
                                        echo '<input class="login__input input error-input" type="text" placeholder="Введеите логин" id="login" name="login">
                                                <div class="error">' . $_SESSION['authorization'][0]['error'] . '</div>';
                                        $_SESSION['authorization'] = null;
                                    } else {
                                        echo '<input class="login__input input" type="text" placeholder="Введеите логин" id="login" name="login">';
                                    }
                                ?>
                            </div>
                            <div class="login__input-form input-form">
                                <label class="label__for-input" for="password">
                                    Пароль
                                </label>
                                <?
                                    if ($_SESSION['authorization'][0]['type'] === 'password') {
                                        echo '<input class="login__input input error-input" type="password" placeholder="Введеите пароль" id="password" name="password">
                                                <div class="error">' . $_SESSION['authorization'][0]['error'] . '</div>';
                                        $_SESSION['authorization'] = null;
                                    } else {
                                        echo '<input class="login__input input" type="password" placeholder="Введеите пароль" id="password" name="password">';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="login__bottom">
                            <button class="login__button button-yellow" name="login_button" disabled>
                                Войти
                            </button>
                            <label class="login__checkbox checkbox" for="id">
                                <input class="checkbox__input" type="checkbox" id="id" name="is_remembered">
                                <span class="checkbox__text">
                                    <span>
                                        Запомнить меня
                                    </span>
                                    <svg class="checkbox__checked" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 6.05L6.96774 11L16 2" stroke="white" stroke-width="3" stroke-linecap="round"/>
                                    </svg>                                
                                </span>
                            </label>
                            <div class="login__links">
                                <a class="login__href" href="">
                                    Забыли пароль?
                                </a>
                                <a class="login__href" href="">
                                    Зарегистрироваться
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
            <?= renderFooter() ?>
        </div>
        <? require_once './source/components/script.php'; ?>
    </body>
</html>