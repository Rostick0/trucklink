<!DOCTYPE html>
<html lang="ru">

<head>
    <? require_once __DIR__ . './../components/meta.php' ?>
    <? require_once __DIR__ . './../components/style.php' ?>
    <title>Создание заявки</title>
</head>

<body>
    <div class="wrapper applicaton-create">
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
                <div class="applicaton-create__main">
                    <div class="applicaton-create__top">
                        <div class="applicaton-create__link">
                            <div class="applicaton-create__arrow">
                                <svg width="1rem" height="0.69rem" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.195001 5.04502L4.875 0.201097C5.00092 0.0766103 5.1691 0.00790116 5.34354 0.00967715C5.51797 0.0114531 5.6848 0.0835732 5.80831 0.210599C5.93183 0.337626 6.00221 0.509464 6.00439 0.68933C6.00658 0.869197 5.94039 1.0428 5.82 1.17297L2.3025 4.813H15.3325C15.4234 4.80726 15.5145 4.82076 15.6002 4.85269C15.6859 4.88462 15.7643 4.93429 15.8307 4.99865C15.897 5.06301 15.9499 5.14069 15.986 5.22692C16.0222 5.31314 16.0408 5.40608 16.0408 5.50002C16.0408 5.59395 16.0222 5.6869 15.986 5.77312C15.9499 5.85935 15.897 5.93703 15.8307 6.00139C15.7643 6.06575 15.6859 6.11542 15.6002 6.14735C15.5145 6.17928 15.4234 6.19278 15.3325 6.18704H2.25L5.8175 9.82449C5.88537 9.8867 5.94022 9.96253 5.97868 10.0474C6.01715 10.1322 6.03843 10.2242 6.04121 10.3178C6.044 10.4114 6.02824 10.5046 5.99489 10.5917C5.96154 10.6788 5.91131 10.7579 5.84727 10.8243C5.78323 10.8907 5.70673 10.9429 5.62244 10.9778C5.53816 11.0126 5.44786 11.0294 5.35708 11.027C5.2663 11.0246 5.17695 11.0032 5.09449 10.964C5.01203 10.9247 4.93819 10.8686 4.8775 10.7989L0.197501 6.01947C0.135366 5.95554 0.0860701 5.87959 0.0524359 5.79599C0.0188007 5.71238 0.00148773 5.62276 0.00148773 5.53224C0.00148773 5.44173 0.0188007 5.3521 0.0524359 5.2685C0.0860701 5.18489 0.135366 5.10895 0.197501 5.04502H0.195001Z" fill="#9A9A9A" />
                                </svg>
                            </div>
                            <a href="/" class="applicaton-create__href link">
                                назад
                            </a>
                        </div>
                        <div class="applicaton-create__title section-title">
                            Добавить груз
                        </div>
                        <div class="applicaton-create__link">
                            <a href="/pages/cargo-create2.html" class="applicaton-create__href link">
                                пропустить
                            </a>
                            <div class="applicaton-create__arrow">
                                <svg width="1rem" height="0.69rem" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8051 5.04502L11.1251 0.201097C10.9991 0.0766103 10.831 0.00790116 10.6565 0.00967715C10.4821 0.0114531 10.3153 0.0835732 10.1917 0.210599C10.0682 0.337626 9.99785 0.509464 9.99567 0.68933C9.99348 0.869197 10.0597 1.0428 10.1801 1.17297L13.6976 4.813H0.66756C0.576634 4.80726 0.48553 4.82076 0.399857 4.85269C0.314183 4.88462 0.235754 4.93429 0.169399 4.99865C0.103043 5.06301 0.0501646 5.14069 0.0140198 5.22692C-0.022125 5.31314 -0.0407715 5.40608 -0.0407715 5.50002C-0.0407715 5.59395 -0.022125 5.6869 0.0140198 5.77312C0.0501646 5.85935 0.103043 5.93703 0.169399 6.00139C0.235754 6.06575 0.314183 6.11542 0.399857 6.14735C0.48553 6.17928 0.576634 6.19278 0.66756 6.18704H13.7501L10.1826 9.82449C10.1147 9.8867 10.0598 9.96253 10.0214 10.0474C9.98291 10.1322 9.96163 10.2242 9.95885 10.3178C9.95606 10.4114 9.97182 10.5046 10.0052 10.5917C10.0385 10.6788 10.0887 10.7579 10.1528 10.8243C10.2168 10.8907 10.2933 10.9429 10.3776 10.9778C10.4619 11.0126 10.5522 11.0294 10.643 11.027C10.7338 11.0246 10.8231 11.0032 10.9056 10.964C10.988 10.9247 11.0619 10.8686 11.1226 10.7989L15.8026 6.01947C15.8647 5.95554 15.914 5.87959 15.9476 5.79599C15.9813 5.71238 15.9986 5.62276 15.9986 5.53224C15.9986 5.44173 15.9813 5.3521 15.9476 5.2685C15.914 5.18489 15.8647 5.10895 15.8026 5.04502H15.8051Z" fill="#9A9A9A" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="applicaton-create__subtitle section-subtitle">
                        Контактная информация
                    </div>
                    <form class="applicaton-create__form">
                        <div class="input__block">
                            <label class="input__title" for="user_fullname">
                                Имя и фамилия:
                            </label>
                            <input class="input" type="text" id="user_fullname" placeholder="Сергей Иванов">
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="user_phone">
                                Номер телефона:
                            </label>
                            <input class="input" type="number" id="user_phone" placeholder="+1(ххх)ххх-хх-хх">
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="user_email">
                                E-mail:
                            </label>
                            <input class="input" type="email" id="user_email" placeholder="info@trucklink.com">
                        </div>
                        <button class="applicaton-create__form_create button">
                            Отправить
                        </button>
                    </form>
                </div>
            </div>
        </main>
        <? require_once __DIR__ . './../components/footer.php'; ?>
    </div>
    <? require_once __DIR__ . './../components/script.php'; ?>
</body>

</html>