<?

function renderHeaderAuthorization()
{
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

function renderHeader($title)
{
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
                            <ul class="header__burger-fixed__socials">
                                <li class="header__burger-fixed__social">
                                    <a href="malito:info@trucklink.pro">
                                        info@trucklink.pro                                                  
                                    </a>
                                </li>
                                    <li class="header__burger-fixed__social">
                                    <a href="">
                                        написать в Telegram                                                                                                    
                                    </a>
                                </li>
                            </ul>
                            <div class="header__burger_switch-theme switch-theme">
                                <div class="switch-theme__switch">
                                    <div class="switch-theme__circle"></div>
                                </div>
                                <div class="switch-theme__icon">
                                    <svg width="1.375rem" height="1.375rem" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5 16.5L18 18L16.5 16.5ZM19 11H21H19ZM5.5 5.5L4 4L5.5 5.5ZM16.5 5.5L18 4L16.5 5.5ZM5.5 16.5L4 18L5.5 16.5ZM1 11H3H1ZM11 1V3V1ZM11 19V21V19ZM15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C13.2091 7 15 8.79086 15 11Z" stroke="#FFA61B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                
                                </div>
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