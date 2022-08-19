<?

function renderHeaderAuthorization() {
    if ($_SESSION['user']['id']) {
        return '
            <div class="header__rigth header__authorization">
                <a class="header__authorization_link" href="profile?id=' . $_SESSION['user']['id'] . '">
                    <button class="header__button button-yellow">
                        Профиль
                    </button>
                </a>
            </div>';
    }

    return '<div class="header__rigth header__authorization">
            <a class="header__authorization_link" href="login">
                <button class="header__button button-yellow">
                    Вход
                </button>
            </a>
            <a class="header__authorization_link" href="registration">
                <button class="header__button button-dark">
                    Регистрация
                </button>
            </a>
            </div>
        </div>';
}

function renderHeader($title) {
    return '<header class="header">
    <div class="container">
        <div class="header__container">
            <div class="header__left">
                <div class="header__burger">
                    <div class="header__burger_icon header__burger_active">
                        <svg class="header__burger_icon_lines" width="34" height="18" viewBox="0 0 34 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="34" height="4" fill="#2D2D41"/>
                            <rect y="7" width="34" height="4" fill="#2D2D41"/>
                            <rect y="14" width="17" height="4" fill="#2D2D41"/>
                        </svg>                                    
                    </div>
                    <div class="header__burger-fixed">
                        <div class="header__burger-fixed__inner block-default container">
                            <div class="header__burger_close"></div>
                            <ul class="header__burger-fixed_menu menu__list">
                                <li class="menu__item">
                                    <a class="menu__link ' . ($_SERVER["REQUEST_URI"] == "/" ? '_active' : null) . '" href="/">
                                        Главная
                                    </a>
                                </li>
                                <li class="menu__item">
                                    <a class="menu__link ' . ($_SERVER["REQUEST_URI"] == "/cargo" ? '_active' : null) . '" href="cargo">
                                        Грузы
                                    </a>
                                </li>
                                <li class="menu__item">
                                    <a class="menu__link ' . ($_SERVER["REQUEST_URI"] == "/transport" ? '_active' : null) . '" href="transport">
                                        Транспорт
                                    </a>
                                </li>
                                <li class="menu__item">
                                    <a class="menu__link" href="">
                                        О компании
                                    </a>
                                </li>
                                <li class="menu__item">
                                    <a class="menu__link" href="">
                                        Тарифы
                                    </a>
                                </li>
                                <li class="menu__item">
                                    <a class="menu__link ' . ($_SERVER["REQUEST_URI"] == "/support" ? '_active' : null) . '" href="support">
                                        Поддержка
                                    </a>
                                </li>
                            </ul>
                            <div class="header__burger-fixed__bottom">
                                <ul class="header__burger-fixed__socials">
                                    <li class="header__burger-fixed__social">
                                        <a href="malito:info@trucklink.pro">
                                            info@trucklink.pro                                                  
                                        </a>
                                    </li>
                                    <li class="header__burger-fixed__social">
                                        <a href="">
                                            Написать в Telegram                                                                                                    
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__title-page">
                    ' . $title . '
                </div>
            </div>
            <a class="header__logo" href="/">
                <h3 class="logo">
                    trucklink
                </h3>  
                </a>
                ' . renderHeaderAuthorization() . '
            </div>
        </header>';
}

?>