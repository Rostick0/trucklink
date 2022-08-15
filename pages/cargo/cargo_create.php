<?

$citiesAll = City::getWithCountry();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php'; ?>
    <title>Добавить груз</title>
</head>
<body>
    <div class="wrapper">
        <?= renderHeader("Добавить груз") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                    <form class="information" action="" method="POST">
                        <div class="page-title">
                            Добавить груз
                        </div>
                        <div class="information-basic block-default">
                            <div class="page-title information__title">
                                Основная информация
                            </div>
                            <div class="information-basic_form">
                                <div class="information-basic__price">
                                    <div class="information-basic__input-form input-form">
                                        <label class="label__for-input" for="price">
                                            Цена
                                        </label>
                                        <input type="number" class="input" placeholder="Введите сумму" name="price" id="price">
                                    </div>
                                </div>
                                <div class="information-basic__to_from">
                                    <label class="label__for-input_computer" for="from">
                                        Откуда
                                    </label>
                                    <label class="label__for-input_computer" for="to">
                                        Куда
                                    </label>
                                    <div class="information-basic__to_from__inputs">
                                        <label class="label__for-input_mobile" for="from">
                                            Откуда
                                        </label>
                                        <div class="_select z-index-20">
                                            <div class="_select__block">
                                                <input type="text" class="_select__show input" placeholder="Адрес" id="from" disabled>
                                                <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                                </svg>                            
                                            </div>
                                            <ul class="_select__list">
                                                <div class="_select__item">
                                                    <input class="_select__input input" type="text">
                                                </div>
                                                <?
                                                foreach ($citiesAll as $value) {
                                                    echo '
                                                        <li class="_select__item">
                                                        <label for="city_from_' . $value['city_id'] . '">
                                                            ' . $value['country'] . ', ' . $value['city'] . '
                                                            <input name="from" type="radio" id="city_from_' . $value['city_id'] . '" value="' . $value['city_id'] . '" hidden>
                                                        </label>
                                                        </li>
                                                    ';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <label class="label__for-input_mobile" for="to">
                                            Куда
                                        </label>
                                        <div class="_select z-index-16">
                                            <div class="_select__block">
                                                <input type="text" class="_select__show input" placeholder="Адрес" id="to" disabled>
                                                <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                                </svg>                            
                                            </div>
                                            <ul class="_select__list">
                                                <div class="_select__item">
                                                    <input class="_select__input input" type="text">
                                                </div>
                                                <?
                                                foreach ($citiesAll as $value) {
                                                    echo '
                                                        <li class="_select__item">
                                                        <label for="city_to_' . $value['city_id'] . '">
                                                            ' . $value['country'] . ', ' . $value['city'] . '
                                                            <input name="to" type="radio" id="city_to_' . $value['city_id'] . '" value="' . $value['city_id'] . '" hidden>
                                                        </label>
                                                        </li>
                                                    ';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="information-basic__date">
                                    <div class="information-basic__input-form input-form">
                                        <label class="label__for-input" for="">Дата загрузки</label>
                                        <div class="filter__small-inputs">
                                            <div class="calendar-form">
                                                <input type="text" class="input date_start__input" placeholder="От" name="date_start">
                                                <svg class="input-form__calendar" width="25" height="29" viewBox="0 0 25 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.5 22.9355C12.7472 22.9355 12.9889 22.8609 13.1945 22.721C13.4 22.5812 13.5602 22.3824 13.6549 22.1498C13.7495 21.9173 13.7742 21.6614 13.726 21.4145C13.6778 21.1676 13.5587 20.9408 13.3839 20.7628C13.2091 20.5848 12.9863 20.4636 12.7439 20.4145C12.5014 20.3654 12.2501 20.3906 12.0216 20.4869C11.7932 20.5833 11.598 20.7464 11.4607 20.9557C11.3233 21.165 11.25 21.4111 11.25 21.6628C11.25 22.0003 11.3817 22.3241 11.6161 22.5627C11.8505 22.8014 12.1685 22.9355 12.5 22.9355ZM18.75 22.9355C18.9972 22.9355 19.2389 22.8609 19.4445 22.721C19.65 22.5812 19.8102 22.3824 19.9049 22.1498C19.9995 21.9173 20.0242 21.6614 19.976 21.4145C19.9277 21.1676 19.8087 20.9408 19.6339 20.7628C19.4591 20.5848 19.2363 20.4636 18.9939 20.4145C18.7514 20.3654 18.5001 20.3906 18.2716 20.4869C18.0432 20.5833 17.848 20.7464 17.7107 20.9557C17.5733 21.165 17.5 21.4111 17.5 21.6628C17.5 22.0003 17.6317 22.3241 17.8661 22.5627C18.1005 22.8014 18.4185 22.9355 18.75 22.9355ZM18.75 17.8446C18.9972 17.8446 19.2389 17.77 19.4445 17.6301C19.65 17.4903 19.8102 17.2915 19.9049 17.0589C19.9995 16.8264 20.0242 16.5705 19.976 16.3236C19.9277 16.0767 19.8087 15.8499 19.6339 15.6719C19.4591 15.4939 19.2363 15.3727 18.9939 15.3236C18.7514 15.2745 18.5001 15.2997 18.2716 15.396C18.0432 15.4924 17.848 15.6555 17.7107 15.8648C17.5733 16.0741 17.5 16.3202 17.5 16.5719C17.5 16.9094 17.6317 17.2332 17.8661 17.4718C18.1005 17.7105 18.4185 17.8446 18.75 17.8446ZM12.5 17.8446C12.7472 17.8446 12.9889 17.77 13.1945 17.6301C13.4 17.4903 13.5602 17.2915 13.6549 17.0589C13.7495 16.8264 13.7742 16.5705 13.726 16.3236C13.6778 16.0767 13.5587 15.8499 13.3839 15.6719C13.2091 15.4939 12.9863 15.3727 12.7439 15.3236C12.5014 15.2745 12.2501 15.2997 12.0216 15.396C11.7932 15.4924 11.598 15.6555 11.4607 15.8648C11.3233 16.0741 11.25 16.3202 11.25 16.5719C11.25 16.9094 11.3817 17.2332 11.6161 17.4718C11.8505 17.7105 12.1685 17.8446 12.5 17.8446ZM21.25 2.57188H20V1.29916C20 0.961607 19.8683 0.637884 19.6339 0.399201C19.3995 0.160519 19.0815 0.0264282 18.75 0.0264282C18.4185 0.0264282 18.1005 0.160519 17.8661 0.399201C17.6317 0.637884 17.5 0.961607 17.5 1.29916V2.57188H7.5V1.29916C7.5 0.961607 7.3683 0.637884 7.13388 0.399201C6.89946 0.160519 6.58152 0.0264282 6.25 0.0264282C5.91848 0.0264282 5.60054 0.160519 5.36612 0.399201C5.1317 0.637884 5 0.961607 5 1.29916V2.57188H3.75C2.75544 2.57188 1.80161 2.97415 1.09835 3.6902C0.395088 4.40625 0 5.37742 0 6.39006V24.2082C0 25.2209 0.395088 26.1921 1.09835 26.9081C1.80161 27.6242 2.75544 28.0264 3.75 28.0264H21.25C22.2446 28.0264 23.1984 27.6242 23.9016 26.9081C24.6049 26.1921 25 25.2209 25 24.2082V6.39006C25 5.37742 24.6049 4.40625 23.9016 3.6902C23.1984 2.97415 22.2446 2.57188 21.25 2.57188ZM22.5 24.2082C22.5 24.5458 22.3683 24.8695 22.1339 25.1082C21.8995 25.3469 21.5815 25.481 21.25 25.481H3.75C3.41848 25.481 3.10054 25.3469 2.86612 25.1082C2.6317 24.8695 2.5 24.5458 2.5 24.2082V12.7537H22.5V24.2082ZM22.5 10.2082H2.5V6.39006C2.5 6.05252 2.6317 5.72879 2.86612 5.49011C3.10054 5.25143 3.41848 5.11734 3.75 5.11734H5V6.39006C5 6.72761 5.1317 7.05134 5.36612 7.29002C5.60054 7.5287 5.91848 7.66279 6.25 7.66279C6.58152 7.66279 6.89946 7.5287 7.13388 7.29002C7.3683 7.05134 7.5 6.72761 7.5 6.39006V5.11734H17.5V6.39006C17.5 6.72761 17.6317 7.05134 17.8661 7.29002C18.1005 7.5287 18.4185 7.66279 18.75 7.66279C19.0815 7.66279 19.3995 7.5287 19.6339 7.29002C19.8683 7.05134 20 6.72761 20 6.39006V5.11734H21.25C21.5815 5.11734 21.8995 5.25143 22.1339 5.49011C22.3683 5.72879 22.5 6.05252 22.5 6.39006V10.2082ZM6.25 17.8446C6.49723 17.8446 6.7389 17.77 6.94446 17.6301C7.15002 17.4903 7.31024 17.2915 7.40485 17.0589C7.49946 16.8264 7.52421 16.5705 7.47598 16.3236C7.42775 16.0767 7.3087 15.8499 7.13388 15.6719C6.95907 15.4939 6.73634 15.3727 6.49386 15.3236C6.25139 15.2745 6.00005 15.2997 5.77165 15.396C5.54324 15.4924 5.34801 15.6555 5.21066 15.8648C5.07331 16.0741 5 16.3202 5 16.5719C5 16.9094 5.1317 17.2332 5.36612 17.4718C5.60054 17.7105 5.91848 17.8446 6.25 17.8446ZM6.25 22.9355C6.49723 22.9355 6.7389 22.8609 6.94446 22.721C7.15002 22.5812 7.31024 22.3824 7.40485 22.1498C7.49946 21.9173 7.52421 21.6614 7.47598 21.4145C7.42775 21.1676 7.3087 20.9408 7.13388 20.7628C6.95907 20.5848 6.73634 20.4636 6.49386 20.4145C6.25139 20.3654 6.00005 20.3906 5.77165 20.4869C5.54324 20.5833 5.34801 20.7464 5.21066 20.9557C5.07331 21.165 5 21.4111 5 21.6628C5 22.0003 5.1317 22.3241 5.36612 22.5627C5.60054 22.8014 5.91848 22.9355 6.25 22.9355Z" fill="#2D2D41"/>
                                                </svg>
                                                <div class="calendar">
                                                    <div class="calendar__year">
                                                        <div class="calendar__arrow_left calendar__year_left">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                        <div class="calendar__year_text calendar__text">
                                                            2022
                                                        </div>
                                                        <div class="calendar__arrow_right calendar__year_right">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                    </div>
                                                    <div class="calendar__month">
                                                        <div class="calendar__arrow_left calendar__month_left">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                        <div class="calendar__month_text calendar__text">
                                                            Август
                                                        </div>
                                                        <div class="calendar__arrow_right calendar__month_right">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                    </div>
                                                    <ul class="calendar__weekday">
                                                        <li class="calendar__weekday_item">
                                                            пн
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            вт
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            ср
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            чт
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            пт
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            сб
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            вс
                                                        </li>
                                                    </ul>
                                                    <ul class="calendar__day">
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="calendar-form">
                                                <input type="text" class="input date_end__input" placeholder="До" name="date_end">
                                                <svg class="input-form__calendar" width="25" height="29" viewBox="0 0 25 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.5 22.9355C12.7472 22.9355 12.9889 22.8609 13.1945 22.721C13.4 22.5812 13.5602 22.3824 13.6549 22.1498C13.7495 21.9173 13.7742 21.6614 13.726 21.4145C13.6778 21.1676 13.5587 20.9408 13.3839 20.7628C13.2091 20.5848 12.9863 20.4636 12.7439 20.4145C12.5014 20.3654 12.2501 20.3906 12.0216 20.4869C11.7932 20.5833 11.598 20.7464 11.4607 20.9557C11.3233 21.165 11.25 21.4111 11.25 21.6628C11.25 22.0003 11.3817 22.3241 11.6161 22.5627C11.8505 22.8014 12.1685 22.9355 12.5 22.9355ZM18.75 22.9355C18.9972 22.9355 19.2389 22.8609 19.4445 22.721C19.65 22.5812 19.8102 22.3824 19.9049 22.1498C19.9995 21.9173 20.0242 21.6614 19.976 21.4145C19.9277 21.1676 19.8087 20.9408 19.6339 20.7628C19.4591 20.5848 19.2363 20.4636 18.9939 20.4145C18.7514 20.3654 18.5001 20.3906 18.2716 20.4869C18.0432 20.5833 17.848 20.7464 17.7107 20.9557C17.5733 21.165 17.5 21.4111 17.5 21.6628C17.5 22.0003 17.6317 22.3241 17.8661 22.5627C18.1005 22.8014 18.4185 22.9355 18.75 22.9355ZM18.75 17.8446C18.9972 17.8446 19.2389 17.77 19.4445 17.6301C19.65 17.4903 19.8102 17.2915 19.9049 17.0589C19.9995 16.8264 20.0242 16.5705 19.976 16.3236C19.9277 16.0767 19.8087 15.8499 19.6339 15.6719C19.4591 15.4939 19.2363 15.3727 18.9939 15.3236C18.7514 15.2745 18.5001 15.2997 18.2716 15.396C18.0432 15.4924 17.848 15.6555 17.7107 15.8648C17.5733 16.0741 17.5 16.3202 17.5 16.5719C17.5 16.9094 17.6317 17.2332 17.8661 17.4718C18.1005 17.7105 18.4185 17.8446 18.75 17.8446ZM12.5 17.8446C12.7472 17.8446 12.9889 17.77 13.1945 17.6301C13.4 17.4903 13.5602 17.2915 13.6549 17.0589C13.7495 16.8264 13.7742 16.5705 13.726 16.3236C13.6778 16.0767 13.5587 15.8499 13.3839 15.6719C13.2091 15.4939 12.9863 15.3727 12.7439 15.3236C12.5014 15.2745 12.2501 15.2997 12.0216 15.396C11.7932 15.4924 11.598 15.6555 11.4607 15.8648C11.3233 16.0741 11.25 16.3202 11.25 16.5719C11.25 16.9094 11.3817 17.2332 11.6161 17.4718C11.8505 17.7105 12.1685 17.8446 12.5 17.8446ZM21.25 2.57188H20V1.29916C20 0.961607 19.8683 0.637884 19.6339 0.399201C19.3995 0.160519 19.0815 0.0264282 18.75 0.0264282C18.4185 0.0264282 18.1005 0.160519 17.8661 0.399201C17.6317 0.637884 17.5 0.961607 17.5 1.29916V2.57188H7.5V1.29916C7.5 0.961607 7.3683 0.637884 7.13388 0.399201C6.89946 0.160519 6.58152 0.0264282 6.25 0.0264282C5.91848 0.0264282 5.60054 0.160519 5.36612 0.399201C5.1317 0.637884 5 0.961607 5 1.29916V2.57188H3.75C2.75544 2.57188 1.80161 2.97415 1.09835 3.6902C0.395088 4.40625 0 5.37742 0 6.39006V24.2082C0 25.2209 0.395088 26.1921 1.09835 26.9081C1.80161 27.6242 2.75544 28.0264 3.75 28.0264H21.25C22.2446 28.0264 23.1984 27.6242 23.9016 26.9081C24.6049 26.1921 25 25.2209 25 24.2082V6.39006C25 5.37742 24.6049 4.40625 23.9016 3.6902C23.1984 2.97415 22.2446 2.57188 21.25 2.57188ZM22.5 24.2082C22.5 24.5458 22.3683 24.8695 22.1339 25.1082C21.8995 25.3469 21.5815 25.481 21.25 25.481H3.75C3.41848 25.481 3.10054 25.3469 2.86612 25.1082C2.6317 24.8695 2.5 24.5458 2.5 24.2082V12.7537H22.5V24.2082ZM22.5 10.2082H2.5V6.39006C2.5 6.05252 2.6317 5.72879 2.86612 5.49011C3.10054 5.25143 3.41848 5.11734 3.75 5.11734H5V6.39006C5 6.72761 5.1317 7.05134 5.36612 7.29002C5.60054 7.5287 5.91848 7.66279 6.25 7.66279C6.58152 7.66279 6.89946 7.5287 7.13388 7.29002C7.3683 7.05134 7.5 6.72761 7.5 6.39006V5.11734H17.5V6.39006C17.5 6.72761 17.6317 7.05134 17.8661 7.29002C18.1005 7.5287 18.4185 7.66279 18.75 7.66279C19.0815 7.66279 19.3995 7.5287 19.6339 7.29002C19.8683 7.05134 20 6.72761 20 6.39006V5.11734H21.25C21.5815 5.11734 21.8995 5.25143 22.1339 5.49011C22.3683 5.72879 22.5 6.05252 22.5 6.39006V10.2082ZM6.25 17.8446C6.49723 17.8446 6.7389 17.77 6.94446 17.6301C7.15002 17.4903 7.31024 17.2915 7.40485 17.0589C7.49946 16.8264 7.52421 16.5705 7.47598 16.3236C7.42775 16.0767 7.3087 15.8499 7.13388 15.6719C6.95907 15.4939 6.73634 15.3727 6.49386 15.3236C6.25139 15.2745 6.00005 15.2997 5.77165 15.396C5.54324 15.4924 5.34801 15.6555 5.21066 15.8648C5.07331 16.0741 5 16.3202 5 16.5719C5 16.9094 5.1317 17.2332 5.36612 17.4718C5.60054 17.7105 5.91848 17.8446 6.25 17.8446ZM6.25 22.9355C6.49723 22.9355 6.7389 22.8609 6.94446 22.721C7.15002 22.5812 7.31024 22.3824 7.40485 22.1498C7.49946 21.9173 7.52421 21.6614 7.47598 21.4145C7.42775 21.1676 7.3087 20.9408 7.13388 20.7628C6.95907 20.5848 6.73634 20.4636 6.49386 20.4145C6.25139 20.3654 6.00005 20.3906 5.77165 20.4869C5.54324 20.5833 5.34801 20.7464 5.21066 20.9557C5.07331 21.165 5 21.4111 5 21.6628C5 22.0003 5.1317 22.3241 5.36612 22.5627C5.60054 22.8014 5.91848 22.9355 6.25 22.9355Z" fill="#2D2D41"/>
                                                </svg>
                                                <div class="calendar">
                                                    <div class="calendar__year">
                                                        <div class="calendar__arrow_left calendar__year_left">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                        <div class="calendar__year_text calendar__text">
                                                            2022
                                                        </div>
                                                        <div class="calendar__arrow_right calendar__year_right">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                    </div>
                                                    <div class="calendar__month">
                                                        <div class="calendar__arrow_left calendar__month_left">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                        <div class="calendar__month_text calendar__text">
                                                            Август
                                                        </div>
                                                        <div class="calendar__arrow_right calendar__month_right">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>                                    
                                                        </div>
                                                    </div>
                                                    <ul class="calendar__weekday">
                                                        <li class="calendar__weekday_item">
                                                            пн
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            вт
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            ср
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            чт
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            пт
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            сб
                                                        </li>
                                                        <li class="calendar__weekday_item">
                                                            вс
                                                        </li>
                                                    </ul>
                                                    <ul class="calendar__day">
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                        <li class="calendar__day_item"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="information-basic__input-form input-form">
                                    <label class="label__for-input" for="transport_upload">
                                        Тип транспорта
                                    </label>
                                    <div class="_select z-index-12">
                                        <div class="_select__block">
                                            <input type="text" class="_select__show input" id="transport_upload" placeholder="Выберите из списка" disabled>
                                            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                            </svg>                            
                                        </div>
                                        <ul class="_select__list">
                                            <? foreach (TransportUpload::get() as $value) {
                                                echo '<li class="_select__item">
                                                        <label for="transport_upload_' . $value['transport_upload_id'] . '">
                                                            ' . $value['name'] . '
                                                            <input name="transport_upload" type="radio" id="transport_upload_' . $value['transport_upload_id'] . '" value="' . $value['transport_upload_id'] . '" hidden>
                                                        </label>
                                                    </li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="information-basic__input-form input-form">
                                    <label class="label__for-input" for="upload_type">
                                        Загрузка
                                    </label>
                                    <div class="_select">
                                        <div class="_select__block">
                                            <input type="text" class="_select__show input" id="upload_type" placeholder="Выберите из списка" disabled>
                                            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                            </svg>                            
                                        </div>
                                        <ul class="_select__list">
                                            <? foreach (Model::get('upload_type') as $value) {
                                                    echo '<li class="_select__item">
                                                            <label for="upload_type_' . $value['upload_type_id'] . '">
                                                                ' . $value['name'] . '
                                                                <input name="upload_type" type="radio" id="upload_type_' . $value['upload_type_id'] . '" value="' . $value['upload_type_id'] . '" hidden>
                                                            </label>
                                                        </li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="information-basic__checkbox">
                                    <label class="checkbox _right" for="id">
                                        <input class="checkbox__input" type="checkbox" name="is_any_direction" id="id">
                                        <span class="checkbox__text">
                                            <span>
                                                Любое направление
                                            </span>
                                            <svg class="checkbox__checked" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 6.05L6.96774 11L16 2" stroke="white" stroke-width="3" stroke-linecap="round"/>
                                            </svg>                                
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="information-additional block-default">
                            <div class="page-title information__title">
                                Дополнительная информация
                            </div>
                            <div class="information-additional__inputs">
                                <div class="information-additional__input-form input-form">
                                    <label class="label__for-input" for="">
                                        Объём <sup>м3</sup>
                                    </label>
                                    <input type="number" class="input" placeholder="Введите объём" name="volume">
                                </div>
                                <div class="information-additional__input-form input-form">
                                    <label class="label__for-input" for="">
                                        Масса <sup>т</sup>
                                    </label>
                                    <input type="number" class="input" placeholder="Введите массу" name="weight">
                                </div>
                                <div class="information-additional__input-form input-form">
                                    <label class="label__for-input" for="">
                                        Длина <sup>м</sup>
                                    </label>
                                    <input type="number" class="input" placeholder="Введите длину" name="length">
                                </div>
                                <div class="information-additional__input-form input-form">
                                    <label class="label__for-input" for="">
                                        Ширина <sup>м</sup>
                                    </label>
                                    <input type="number" class="input" placeholder="Введите ширину" name="width">
                                </div>
                                <div class="information-additional__input-form input-form">
                                    <label class="label__for-input" for="">
                                        Высота <sup>м</sup>
                                    </label>
                                    <input type="number" class="input" placeholder="Введите высоту" name="height">
                                </div>
                            </div>
                            <div class="information-additional__textarea-form textarea-form">
                                <label class="laber__for-textarea" for="user__about">
                                    Описание
                                </label>
                                <textarea class="information-additional__textarea textarea" type="text" placeholder="Начните вводить описание" id="user__about" name="description"></textarea>
                            </div>
                            <button class="button-yellow information-additional__button" name="create_cargo">
                                Добавить груз
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
            <? require_once './source/components/script.php' ?>
        </div>
        <? require_once './source/components/script.php' ?>
    </body>
</html>