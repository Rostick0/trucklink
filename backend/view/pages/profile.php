<?

$user_id = (int) $_GET['id'];

$user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

if (!$user) {
    header('Location: ./');
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <? require_once __DIR__ . './../components/meta.php' ?>
    <? require_once __DIR__ . './../components/style.php' ?>
    <title>Профиль</title>
</head>

<body>
    <div class="wrapper personal-applications">
        <header class="header">
            <div class="container">
                <div class="header__container">
                    <div class="header__top">
                        <div class="header__menu">
                            <div class="header__burger">
                                <span></span>
                            </div>
                        </div>
                        <a class="header__logo" href="/">
                            <svg width="7.437rem" height="2.125rem" viewBox="0 0 119 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.2848 9.90909V12.2955H20.7592V9.90909H28.2848ZM22.6172 6.77273H25.7024V19.0625C25.7024 19.4773 25.7649 19.7955 25.8899 20.017C26.0206 20.233 26.1911 20.3807 26.4013 20.4602C26.6115 20.5398 26.8445 20.5795 27.1002 20.5795C27.2933 20.5795 27.4695 20.5653 27.6286 20.5369C27.7933 20.5085 27.9183 20.483 28.0036 20.4602L28.5235 22.8722C28.3587 22.929 28.1229 22.9915 27.8161 23.0597C27.5149 23.1278 27.1456 23.1676 26.7081 23.179C25.9354 23.2017 25.2394 23.0852 24.62 22.8295C24.0007 22.5682 23.5092 22.1648 23.1456 21.6193C22.7877 21.0739 22.6115 20.392 22.6172 19.5739V6.77273ZM30.5051 23V9.90909H33.4965V12.0909H33.6329C33.8715 11.3352 34.2806 10.7528 34.8602 10.3438C35.4454 9.92898 36.113 9.72159 36.863 9.72159C37.0335 9.72159 37.2238 9.73011 37.434 9.74716C37.65 9.75852 37.8289 9.77841 37.971 9.80682V12.6449C37.8403 12.5994 37.6329 12.5597 37.3488 12.5256C37.0704 12.4858 36.8005 12.4659 36.5392 12.4659C35.9767 12.4659 35.471 12.5881 35.0221 12.8324C34.5789 13.071 34.2295 13.4034 33.9738 13.8295C33.7181 14.2557 33.5903 14.7472 33.5903 15.304V23H30.5051ZM48.0044 17.4943V9.90909H51.0897V23H48.0982V20.6733H47.9618C47.6664 21.4062 47.1806 22.0057 46.5044 22.4716C45.834 22.9375 45.0073 23.1705 44.0243 23.1705C43.1664 23.1705 42.4079 22.9801 41.7488 22.5994C41.0954 22.2131 40.584 21.6534 40.2147 20.9205C39.8454 20.1818 39.6607 19.2898 39.6607 18.2443V9.90909H42.7459V17.767C42.7459 18.5966 42.9732 19.2557 43.4277 19.7443C43.8823 20.233 44.4789 20.4773 45.2175 20.4773C45.6721 20.4773 46.1124 20.3665 46.5385 20.1449C46.9647 19.9233 47.3141 19.5938 47.5868 19.1562C47.8652 18.7131 48.0044 18.1591 48.0044 17.4943ZM59.6125 23.2557C58.3057 23.2557 57.1835 22.9688 56.246 22.3949C55.3142 21.821 54.5954 21.0284 54.0898 20.017C53.5898 19 53.3398 17.8295 53.3398 16.5057C53.3398 15.1761 53.5954 14.0028 54.1068 12.9858C54.6182 11.9631 55.3398 11.1676 56.2716 10.5994C57.2091 10.0256 58.317 9.73864 59.5954 9.73864C60.6579 9.73864 61.5983 9.93466 62.4165 10.3267C63.2403 10.7131 63.8966 11.2614 64.3852 11.9716C64.8738 12.6761 65.1523 13.5 65.2204 14.4432H62.2716C62.1523 13.8125 61.8682 13.2869 61.4193 12.8665C60.9761 12.4403 60.3824 12.2273 59.6381 12.2273C59.0074 12.2273 58.4534 12.3977 57.9761 12.7386C57.4988 13.0739 57.1267 13.5568 56.8596 14.1875C56.5983 14.8182 56.4676 15.5739 56.4676 16.4545C56.4676 17.3466 56.5983 18.1136 56.8596 18.7557C57.121 19.392 57.4875 19.8835 57.9591 20.2301C58.4363 20.571 58.996 20.7415 59.6381 20.7415C60.0926 20.7415 60.4988 20.6562 60.8568 20.4858C61.2204 20.3097 61.5244 20.0568 61.7687 19.7273C62.0131 19.3977 62.1807 18.9972 62.2716 18.5256H65.2204C65.1466 19.4517 64.8738 20.2727 64.4023 20.9886C63.9307 21.6989 63.2886 22.2557 62.4761 22.6591C61.6636 23.0568 60.7091 23.2557 59.6125 23.2557ZM70.2063 18.892L70.1978 15.1676H70.6921L75.3967 9.90909H79.0018L73.2148 16.3523H72.5756L70.2063 18.892ZM67.3938 23V5.54545H70.479V23H67.3938ZM75.6097 23L71.3484 17.0426L73.4279 14.8693L79.3001 23H75.6097ZM83.7831 5.54545V23H80.6979V5.54545H83.7831ZM86.5957 23V9.90909H89.6809V23H86.5957ZM88.1468 8.05114C87.6582 8.05114 87.2377 7.8892 86.8855 7.56534C86.5332 7.23579 86.3571 6.84091 86.3571 6.38068C86.3571 5.91477 86.5332 5.51989 86.8855 5.19602C87.2377 4.86648 87.6582 4.7017 88.1468 4.7017C88.6411 4.7017 89.0616 4.86648 89.4082 5.19602C89.7605 5.51989 89.9366 5.91477 89.9366 6.38068C89.9366 6.84091 89.7605 7.23579 89.4082 7.56534C89.0616 7.8892 88.6411 8.05114 88.1468 8.05114ZM95.5787 15.3295V23H92.4935V9.90909H95.4424V12.1335H95.5958C95.8969 11.4006 96.377 10.8182 97.0361 10.3864C97.7009 9.95455 98.5219 9.73864 99.4992 9.73864C100.403 9.73864 101.19 9.93182 101.86 10.3182C102.536 10.7045 103.059 11.2642 103.428 11.9972C103.803 12.7301 103.988 13.6193 103.982 14.6648V23H100.897V15.142C100.897 14.267 100.67 13.5824 100.215 13.0881C99.7662 12.5937 99.1441 12.3466 98.3486 12.3466C97.8088 12.3466 97.3287 12.4659 96.9083 12.7045C96.4935 12.9375 96.1668 13.2756 95.9282 13.7188C95.6952 14.1619 95.5787 14.6989 95.5787 15.3295ZM109.571 18.892L109.562 15.1676H110.057L114.761 9.90909H118.366L112.58 16.3523H111.94L109.571 18.892ZM106.759 23V5.54545H109.844V23H106.759ZM114.974 23L110.713 17.0426L112.793 14.8693L118.665 23H114.974Z" fill="white" />
                                <path d="M22.855 25.447V21.2835C22.855 20.389 22.0967 19.6637 21.1614 19.6637H20.7186V4.4637C20.7186 4.32773 20.6473 4.20085 20.5287 4.12589L19.4537 3.4463C19.1722 3.26837 18.7969 3.46139 18.7969 3.78411V8.66582L18.4765 7.83932C18.0457 6.72773 16.9371 5.99 15.6975 5.99H8.29594C7.04909 5.99 5.9356 6.73629 5.51007 7.85719L5.20309 8.66582V3.78411C5.20309 3.46143 4.82774 3.26837 4.54622 3.4463L3.47115 4.12585C3.35256 4.2008 3.2812 4.32768 3.2812 4.46366V19.6637H2.8385C1.90316 19.6637 1.1449 20.3889 1.1449 21.2835V25.447H0.423364C0.189539 25.447 -1.90735e-06 25.6283 -1.90735e-06 25.852V28.0906C-1.90735e-06 28.3143 0.189539 28.4956 0.423364 28.4956H2.24995V29.5686C2.24995 30.0159 2.62908 30.3785 3.09678 30.3785H5.34069C5.80838 30.3785 6.18751 30.0159 6.18751 29.5686V28.4956H17.8125V29.5686C17.8125 30.0159 18.1917 30.3785 18.6593 30.3785H20.9032C21.3709 30.3785 21.75 30.0159 21.75 29.5686V28.4956H23.5766C23.8105 28.4956 24 28.3143 24 28.0906V25.852C24 25.6283 23.8105 25.4471 23.5766 25.4471L22.855 25.447ZM5.76405 10.9215H18.2359V14.9115H5.76405V10.9215ZM5.47404 24.3138H4.0276C3.58564 24.3138 3.22736 23.9711 3.22736 23.5484V23.5291C3.22736 23.1064 3.58564 22.7637 4.0276 22.7637H5.474C5.91595 22.7637 6.27423 23.1064 6.27423 23.5291V23.5484C6.27428 23.9711 5.916 24.3138 5.47404 24.3138ZM14.8783 24.5395H9.12164C8.65394 24.5395 8.27481 24.1768 8.27481 23.7296V18.598C8.27481 18.1508 8.65394 17.7882 9.12164 17.7882H14.8783C15.3459 17.7882 15.725 18.1508 15.725 18.598V23.7296C15.7251 24.1768 15.3459 24.5395 14.8783 24.5395ZM19.9723 24.3138H18.5259C18.084 24.3138 17.7256 23.9711 17.7256 23.5484V23.5291C17.7256 23.1064 18.084 22.7637 18.5259 22.7637H19.9723C20.4142 22.7637 20.7725 23.1064 20.7725 23.5291V23.5484C20.7725 23.9711 20.4142 24.3138 19.9723 24.3138ZM14.7495 20.7521H9.23682C9.0053 20.7521 8.81765 20.5726 8.81765 20.3512V20.343C8.81765 20.1216 9.0053 19.9422 9.23682 19.9422H14.7495C14.981 19.9422 15.1687 20.1216 15.1687 20.343V20.3512C15.1687 20.5726 14.981 20.7521 14.7495 20.7521ZM14.7495 19.1323H9.23682C9.0053 19.1323 8.81765 18.9528 8.81765 18.7314V18.7233C8.81765 18.5019 9.0053 18.3224 9.23682 18.3224H14.7495C14.981 18.3224 15.1687 18.5019 15.1687 18.7233V18.7314C15.1687 18.9528 14.981 19.1323 14.7495 19.1323ZM14.7495 23.9917H9.23682C9.0053 23.9917 8.81765 23.8122 8.81765 23.5908V23.5827C8.81765 23.3613 9.0053 23.1818 9.23682 23.1818H14.7495C14.981 23.1818 15.1687 23.3613 15.1687 23.5827V23.5908C15.1687 23.8122 14.981 23.9917 14.7495 23.9917ZM14.7495 22.3719H9.23682C9.0053 22.3719 8.81765 22.1924 8.81765 21.971V21.9629C8.81765 21.7415 9.0053 21.562 9.23682 21.562H14.7495C14.981 21.562 15.1687 21.7415 15.1687 21.9629V21.971C15.1687 22.1924 14.981 22.3719 14.7495 22.3719Z" fill="white" />
                                <circle cx="49" cy="26.3783" r="3" stroke="white" stroke-width="2" />
                                <circle cx="88" cy="26.3783" r="3" stroke="white" stroke-width="2" />
                                <path d="M100 26.3783C100 28.0352 98.6569 29.3783 97 29.3783C95.3431 29.3783 94 28.0352 94 26.3783C94 24.7214 95.3431 23.3783 97 23.3783C98.6569 23.3783 100 24.7214 100 26.3783Z" stroke="white" stroke-width="2" />
                            </svg>
                        </a>
                        <div class="header__log">
                            <a class="header__log_href" href="/login">
                                <svg width="1.5rem" height="1.37rem" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 18V16.3333C19 15.4493 18.6313 14.6014 17.9749 13.9763C17.3185 13.3512 16.4283 13 15.5 13H8.5C7.57174 13 6.6815 13.3512 6.02513 13.9763C5.36875 14.6014 5 15.4493 5 16.3333V18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 9C14.433 9 16 7.433 16 5.5C16 3.567 14.433 2 12.5 2C10.567 2 9 3.567 9 5.5C9 7.433 10.567 9 12.5 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>
                                    Войти
                                </span>
                            </a>
                            <a class="header__log_href" href="/registration">
                                <svg width="1.5rem" height="1.37rem" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 18V16.3333C19 15.4493 18.6313 14.6014 17.9749 13.9763C17.3185 13.3512 16.4283 13 15.5 13H8.5C7.57174 13 6.6815 13.3512 6.02513 13.9763C5.36875 14.6014 5 15.4493 5 16.3333V18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.5 9C14.433 9 16 7.433 16 5.5C16 3.567 14.433 2 12.5 2C10.567 2 9 3.567 9 5.5C9 7.433 10.567 9 12.5 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>
                                    Регистрация
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <div class="personal-applications__main_container">
                    <div class="personal-applications__user section-title">
                        <?= $user['name'] . " " . $user['surname'] ?>
                    </div>
                    <div class="personal-applications__greet">
                        Hello!
                    </div>
                    <a class="personal-applications_create button" href="/pages/">
                        <svg width="1.56rem" height="1.5rem " viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 22C18.0228 22 22.5 17.5228 22.5 12C22.5 6.47715 18.0228 2 12.5 2C6.97715 2 2.5 6.47715 2.5 12C2.5 17.5228 6.97715 22 12.5 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12.5 8V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.5 12H16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>
                            Add cargo
                        </span>
                    </a>
                    <table class="application__table">
                        <tbody>
                            <tr class="application__item">
                                <td>
                                    <div class="application__route">
                                        <div class="application__status"></div>
                                        <div class="application__way">
                                            <div class="application__from">
                                                <img src="../img/flag.png" alt=""> Нью-Йорк
                                            </div>
                                            <span class="applicaton__arrow">
                                                →
                                            </span>
                                            <div class="application__to">
                                                <img src="../img/flag.png" alt=""> Вашингтон-на-Бразосе
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__date">
                                        15 апр
                                    </div>
                                </td>
                                <td>
                                    <div class="application__transport">
                                        Специальная техника
                                    </div>
                                </td>
                                <td>
                                    <div class="application__payment">
                                        $10 000
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <div class="application__chat">
                                            <div class="application__chat_count">
                                                0
                                            </div>
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <span>
                                            Chat
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Details
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Track
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3.0003C17.2626 2.73766 17.5744 2.52932 17.9176 2.38718C18.2608 2.24503 18.6286 2.17188 19 2.17188C19.3714 2.17187 19.7392 2.24503 20.0824 2.38718C20.4256 2.52932 20.7374 2.73766 21 3.0003C21.2626 3.26295 21.471 3.57475 21.6131 3.91791C21.7553 4.26107 21.8284 4.62887 21.8284 5.0003C21.8284 5.37174 21.7553 5.73953 21.6131 6.08269C21.471 6.42585 21.2626 6.73766 21 7.0003L7.5 20.5003L2 22.0003L3.5 16.5003L17 3.0003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Edit
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="application__item">
                                <td>
                                    <div class="application__route">
                                        <div class="application__status"></div>
                                        <div class="application__way">
                                            <div class="application__from">
                                                <img src="../img/flag.png" alt=""> Нью-Йорк
                                            </div>
                                            <span class="applicaton__arrow">
                                                →
                                            </span>
                                            <div class="application__to">
                                                <img src="../img/flag.png" alt=""> Вашингтон-на-Бразосе
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__date">
                                        15 апр
                                    </div>
                                </td>
                                <td>
                                    <div class="application__transport">
                                        Специальная техника
                                    </div>
                                </td>
                                <td>
                                    <div class="application__payment">
                                        $10 000
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <div class="application__chat">
                                            <div class="application__chat_count">
                                                0
                                            </div>
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <span>
                                            Chat
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Details
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Track
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3.0003C17.2626 2.73766 17.5744 2.52932 17.9176 2.38718C18.2608 2.24503 18.6286 2.17188 19 2.17188C19.3714 2.17187 19.7392 2.24503 20.0824 2.38718C20.4256 2.52932 20.7374 2.73766 21 3.0003C21.2626 3.26295 21.471 3.57475 21.6131 3.91791C21.7553 4.26107 21.8284 4.62887 21.8284 5.0003C21.8284 5.37174 21.7553 5.73953 21.6131 6.08269C21.471 6.42585 21.2626 6.73766 21 7.0003L7.5 20.5003L2 22.0003L3.5 16.5003L17 3.0003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Edit
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="application__item">
                                <td>
                                    <div class="application__route">
                                        <div class="application__status"></div>
                                        <div class="application__way">
                                            <div class="application__from">
                                                <img src="../img/flag.png" alt=""> Нью-Йорк
                                            </div>
                                            <span class="applicaton__arrow">
                                                →
                                            </span>
                                            <div class="application__to">
                                                <img src="../img/flag.png" alt=""> Вашингтон-на-Бразосе
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__date">
                                        15 апр
                                    </div>
                                </td>
                                <td>
                                    <div class="application__transport">
                                        Специальная техника
                                    </div>
                                </td>
                                <td>
                                    <div class="application__payment">
                                        $10 000
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <div class="application__chat">
                                            <div class="application__chat_count">
                                                0
                                            </div>
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <span>
                                            Chat
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Details
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Track
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="application__flex">
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17 3.0003C17.2626 2.73766 17.5744 2.52932 17.9176 2.38718C18.2608 2.24503 18.6286 2.17188 19 2.17188C19.3714 2.17187 19.7392 2.24503 20.0824 2.38718C20.4256 2.52932 20.7374 2.73766 21 3.0003C21.2626 3.26295 21.471 3.57475 21.6131 3.91791C21.7553 4.26107 21.8284 4.62887 21.8284 5.0003C21.8284 5.37174 21.7553 5.73953 21.6131 6.08269C21.471 6.42585 21.2626 6.73766 21 7.0003L7.5 20.5003L2 22.0003L3.5 16.5003L17 3.0003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Edit
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <? require_once __DIR__ . './../components/script.php'; ?>
</body>

</html>