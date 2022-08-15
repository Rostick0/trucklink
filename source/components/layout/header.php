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
                            <div class="header__burger-fixed__top">
                                <div class="page-title">
                                    Меню
                                </div>
                                <div class="header__burger_icon header__burger_close">
                                    <svg class="header__burger_icon_arrow" width="38" height="22" viewBox="0 0 38 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M35.5625 11H4.75" stroke="#2D2D41" stroke-width="4" stroke-linecap="square"/>
                                        <path d="M12.5625 2L3 11L12.5625 20" stroke="#2D2D41" stroke-width="4"/>
                                    </svg>                                                
                                </div>
                            </div>
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
                                <span>
                                    Мы в соц сетях
                                </span>
                                <ul class="header__burger-fixed__socials">
                                    <li class="header__burger-fixed__social">
                                        <a href="">
                                            <svg class="header__burger-fixed__social_vk" width="27" height="15" viewBox="0 0 27 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.2373 9.53768C24.133 10.3961 25.0783 11.2038 25.8815 12.1487C26.2364 12.5687 26.5723 13.002 26.8293 13.4894C27.1935 14.1822 26.8637 14.9445 26.2309 14.9859L22.2975 14.9842C21.283 15.0668 20.4737 14.6658 19.7932 13.9849C19.2486 13.4403 18.7442 12.8608 18.2206 12.2978C18.0059 12.0678 17.7812 11.8513 17.5128 11.6801C16.9758 11.338 16.5097 11.4427 16.2029 11.9925C15.8903 12.5517 15.8194 13.1709 15.7887 13.7941C15.7466 14.7034 15.4666 14.9424 14.5362 14.9841C12.5479 15.0761 10.6608 14.7808 8.90781 13.7961C7.36229 12.928 6.16381 11.7025 5.12066 10.3151C3.08963 7.61357 1.53426 4.645 0.136359 1.59327C-0.178298 0.905713 0.0518178 0.536635 0.824577 0.523572C2.10778 0.4991 3.3908 0.500842 4.67551 0.521831C5.19704 0.52932 5.5423 0.82298 5.74368 1.30667C6.43793 2.9825 7.28742 4.5769 8.35372 6.05478C8.63769 6.44824 8.92724 6.84171 9.33957 7.11864C9.79572 7.42528 10.143 7.32365 10.3576 6.82481C10.4938 6.50851 10.5534 6.16782 10.5841 5.82905C10.6858 4.66355 10.6991 3.50006 10.5208 2.33866C10.4114 1.61382 9.99549 1.1446 9.25875 1.00743C8.8828 0.9375 8.93877 0.800163 9.12081 0.589498C9.43697 0.226167 9.73433 0 10.3271 0H14.7725C15.4723 0.135596 15.6277 0.444235 15.7235 1.13554L15.7274 5.98311C15.7197 6.25073 15.8635 7.04488 16.3545 7.22202C16.7475 7.34812 17.0066 7.03948 17.2424 6.79485C18.3067 5.68588 19.0663 4.37529 19.745 3.0182C20.0462 2.42148 20.3051 1.80176 20.5561 1.18257C20.742 0.72309 21.0338 0.49701 21.561 0.507025L25.8394 0.51077C25.9663 0.51077 26.0946 0.512599 26.2175 0.533239C26.9384 0.653855 27.136 0.958314 26.9133 1.64944C26.5625 2.73377 25.8799 3.6374 25.2124 4.5452C24.4989 5.5144 23.7358 6.45042 23.0283 7.42537C22.3782 8.31567 22.4298 8.76443 23.2373 9.53768Z" fill="#C2C2C2"/>
                                            </svg>                                                        
                                        </a>
                                    </li>
                                    <li class="header__burger-fixed__social">
                                        <a href="">
                                            <svg class="header__burger-fixed__social_tg" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.23741 7.74888C6.06923 5.20867 9.29121 3.534 10.9033 2.72489C15.5063 0.414697 16.4627 0.0133926 17.0861 0.000141289C17.2232 -0.00277319 17.5298 0.0382296 17.7284 0.232668C17.8961 0.396848 17.9422 0.618632 17.9643 0.774293C17.9864 0.929954 18.0139 1.28455 17.992 1.56163C17.7426 4.7241 16.6633 12.3986 16.1142 15.9406C15.8818 17.4394 15.4244 17.9419 14.9815 17.9911C14.0189 18.098 13.288 17.2235 12.3558 16.4861C10.897 15.3323 10.0729 14.614 8.65691 13.488C7.02048 12.1868 8.08131 11.4716 9.0139 10.3027C9.25797 9.99686 13.4988 5.34226 13.5809 4.92001C13.5912 4.86721 13.6007 4.67036 13.5038 4.56642C13.4069 4.46248 13.2639 4.49802 13.1606 4.52629C13.0143 4.56636 10.6839 6.42501 6.16938 10.1022C5.5079 10.6503 4.90875 10.9174 4.37193 10.9034C3.78013 10.888 2.64175 10.4996 1.79548 10.1677C0.757494 9.76056 -0.0674757 9.5453 0.00436067 8.85385C0.0417775 8.4937 0.452793 8.12538 1.23741 7.74888Z" fill="#C2C2C2"/>
                                            </svg>                                                                                                             
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