<?

$citiesAll = City::getWithCountry();

?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("trucklink - грузоперевозки онлайн") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Главная") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <div class="index">
                        <?= renderNavigationTop() ?>
                        <div class="index__filter">
                            <div class="index__filter_buttons">
                                <button class="index__filter_button button _active search-cargo">
                                    Поиск груза
                                </button>
                                <button class="index__filter_button button search-transport">
                                    Поиск транспорта
                                </button>
                            </div>
                            <div class="boder-top-left-0"></div>
                            <form class="catalog__filter filter block-default boder-top-left-0" method="POST">
                                <div class="filter__to_from">
                                    <label class="label__for-input_computer" for="from">
                                        Откуда
                                    </label>
                                    <label class="label__for-input_computer" for="to">
                                        Куда
                                    </label>
                                    <div class="filter__to_from__inputs">
                                        <label class="label__for-input_mobile" for="from">
                                            Откуда
                                        </label>
                                        <div class="_select-search z-index-20">
                                            <input type="text" class="_select-input input" placeholder="Город отправки" id="from">
                                            <ul class="_select-search__list _select__list">
                                                <?
                                                foreach (City::getWithCountry() as $value) {
                                                    echo '
                                                    <li class="_select__item">
                                                        <label for="city_from_' . $value['city_id'] . '">
                                                            ' . $value['city'] . ', ' . $value['country'] . '
                                                            <input name="from" id="city_from_' . $value['city_id'] . '" value="' . $value['city_id'] . '" type="radio" hidden>
                                                        </label>
                                                    </li> ';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <label class="label__for-input_mobile" for="to">
                                            Куда
                                        </label>
                                        <div class="_select-search z-index-16">
                                            <input type="text" class="_select-input input" placeholder="Город прибытыя" id="to">
                                            <ul class="_select-search__list _select__list">
                                                <?
                                                foreach (City::getWithCountry() as $value) {
                                                    echo '
                                                        <li class="_select__item">
                                                            <label for="city_to_' . $value['city_id'] . '">
                                                                ' . $value['city'] . ', ' . $value['country'] . '
                                                                <input name="to" id="city_to_' . $value['city_id'] . '" value="' . $value['city_id'] . '" type="radio" hidden>
                                                            </label>
                                                        </li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter__input-form input-form">
                                    <label class="label__for-input" for="type">
                                        Тип транспорта
                                    </label>
                                    <div class="_select z-index-12">
                                        <div class="_select__block">
                                            <input type="text" class="_select__show input" id="type" placeholder="Выберите из списка" disabled>
                                            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                        <ul class="_select__list">
                                            <? foreach (TransportUpload::get() as $value) {
                                                echo '<li class="_select__item">
                                                        <label for="transport_upload_' . $value['transport_upload_id'] . '">
                                                            ' . $value['name'] . '
                                                            <input name="transport_upload" id="transport_upload_' . $value['transport_upload_id'] . '" value="' . $value['transport_upload_id'] . '" type="radio" hidden>
                                                            </label>
                                                        </li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter__date">
                                    <div class="filter__input-form input-form">
                                        <label class="label__for-input" for="">Дата загрузки</label>
                                        <div class="filter__small-inputs">
                                            <div class="calendar-form">
                                                <div class="calendar-from__active">
                                                    <input type="text" class="input date_start__input" placeholder="Дата от:" name="date_start" readonly>
                                                    <svg class="input-form__calendar" width="25" height="29" viewBox="0 0 25 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.5 22.9355C12.7472 22.9355 12.9889 22.8609 13.1945 22.721C13.4 22.5812 13.5602 22.3824 13.6549 22.1498C13.7495 21.9173 13.7742 21.6614 13.726 21.4145C13.6778 21.1676 13.5587 20.9408 13.3839 20.7628C13.2091 20.5848 12.9863 20.4636 12.7439 20.4145C12.5014 20.3654 12.2501 20.3906 12.0216 20.4869C11.7932 20.5833 11.598 20.7464 11.4607 20.9557C11.3233 21.165 11.25 21.4111 11.25 21.6628C11.25 22.0003 11.3817 22.3241 11.6161 22.5627C11.8505 22.8014 12.1685 22.9355 12.5 22.9355ZM18.75 22.9355C18.9972 22.9355 19.2389 22.8609 19.4445 22.721C19.65 22.5812 19.8102 22.3824 19.9049 22.1498C19.9995 21.9173 20.0242 21.6614 19.976 21.4145C19.9277 21.1676 19.8087 20.9408 19.6339 20.7628C19.4591 20.5848 19.2363 20.4636 18.9939 20.4145C18.7514 20.3654 18.5001 20.3906 18.2716 20.4869C18.0432 20.5833 17.848 20.7464 17.7107 20.9557C17.5733 21.165 17.5 21.4111 17.5 21.6628C17.5 22.0003 17.6317 22.3241 17.8661 22.5627C18.1005 22.8014 18.4185 22.9355 18.75 22.9355ZM18.75 17.8446C18.9972 17.8446 19.2389 17.77 19.4445 17.6301C19.65 17.4903 19.8102 17.2915 19.9049 17.0589C19.9995 16.8264 20.0242 16.5705 19.976 16.3236C19.9277 16.0767 19.8087 15.8499 19.6339 15.6719C19.4591 15.4939 19.2363 15.3727 18.9939 15.3236C18.7514 15.2745 18.5001 15.2997 18.2716 15.396C18.0432 15.4924 17.848 15.6555 17.7107 15.8648C17.5733 16.0741 17.5 16.3202 17.5 16.5719C17.5 16.9094 17.6317 17.2332 17.8661 17.4718C18.1005 17.7105 18.4185 17.8446 18.75 17.8446ZM12.5 17.8446C12.7472 17.8446 12.9889 17.77 13.1945 17.6301C13.4 17.4903 13.5602 17.2915 13.6549 17.0589C13.7495 16.8264 13.7742 16.5705 13.726 16.3236C13.6778 16.0767 13.5587 15.8499 13.3839 15.6719C13.2091 15.4939 12.9863 15.3727 12.7439 15.3236C12.5014 15.2745 12.2501 15.2997 12.0216 15.396C11.7932 15.4924 11.598 15.6555 11.4607 15.8648C11.3233 16.0741 11.25 16.3202 11.25 16.5719C11.25 16.9094 11.3817 17.2332 11.6161 17.4718C11.8505 17.7105 12.1685 17.8446 12.5 17.8446ZM21.25 2.57188H20V1.29916C20 0.961607 19.8683 0.637884 19.6339 0.399201C19.3995 0.160519 19.0815 0.0264282 18.75 0.0264282C18.4185 0.0264282 18.1005 0.160519 17.8661 0.399201C17.6317 0.637884 17.5 0.961607 17.5 1.29916V2.57188H7.5V1.29916C7.5 0.961607 7.3683 0.637884 7.13388 0.399201C6.89946 0.160519 6.58152 0.0264282 6.25 0.0264282C5.91848 0.0264282 5.60054 0.160519 5.36612 0.399201C5.1317 0.637884 5 0.961607 5 1.29916V2.57188H3.75C2.75544 2.57188 1.80161 2.97415 1.09835 3.6902C0.395088 4.40625 0 5.37742 0 6.39006V24.2082C0 25.2209 0.395088 26.1921 1.09835 26.9081C1.80161 27.6242 2.75544 28.0264 3.75 28.0264H21.25C22.2446 28.0264 23.1984 27.6242 23.9016 26.9081C24.6049 26.1921 25 25.2209 25 24.2082V6.39006C25 5.37742 24.6049 4.40625 23.9016 3.6902C23.1984 2.97415 22.2446 2.57188 21.25 2.57188ZM22.5 24.2082C22.5 24.5458 22.3683 24.8695 22.1339 25.1082C21.8995 25.3469 21.5815 25.481 21.25 25.481H3.75C3.41848 25.481 3.10054 25.3469 2.86612 25.1082C2.6317 24.8695 2.5 24.5458 2.5 24.2082V12.7537H22.5V24.2082ZM22.5 10.2082H2.5V6.39006C2.5 6.05252 2.6317 5.72879 2.86612 5.49011C3.10054 5.25143 3.41848 5.11734 3.75 5.11734H5V6.39006C5 6.72761 5.1317 7.05134 5.36612 7.29002C5.60054 7.5287 5.91848 7.66279 6.25 7.66279C6.58152 7.66279 6.89946 7.5287 7.13388 7.29002C7.3683 7.05134 7.5 6.72761 7.5 6.39006V5.11734H17.5V6.39006C17.5 6.72761 17.6317 7.05134 17.8661 7.29002C18.1005 7.5287 18.4185 7.66279 18.75 7.66279C19.0815 7.66279 19.3995 7.5287 19.6339 7.29002C19.8683 7.05134 20 6.72761 20 6.39006V5.11734H21.25C21.5815 5.11734 21.8995 5.25143 22.1339 5.49011C22.3683 5.72879 22.5 6.05252 22.5 6.39006V10.2082ZM6.25 17.8446C6.49723 17.8446 6.7389 17.77 6.94446 17.6301C7.15002 17.4903 7.31024 17.2915 7.40485 17.0589C7.49946 16.8264 7.52421 16.5705 7.47598 16.3236C7.42775 16.0767 7.3087 15.8499 7.13388 15.6719C6.95907 15.4939 6.73634 15.3727 6.49386 15.3236C6.25139 15.2745 6.00005 15.2997 5.77165 15.396C5.54324 15.4924 5.34801 15.6555 5.21066 15.8648C5.07331 16.0741 5 16.3202 5 16.5719C5 16.9094 5.1317 17.2332 5.36612 17.4718C5.60054 17.7105 5.91848 17.8446 6.25 17.8446ZM6.25 22.9355C6.49723 22.9355 6.7389 22.8609 6.94446 22.721C7.15002 22.5812 7.31024 22.3824 7.40485 22.1498C7.49946 21.9173 7.52421 21.6614 7.47598 21.4145C7.42775 21.1676 7.3087 20.9408 7.13388 20.7628C6.95907 20.5848 6.73634 20.4636 6.49386 20.4145C6.25139 20.3654 6.00005 20.3906 5.77165 20.4869C5.54324 20.5833 5.34801 20.7464 5.21066 20.9557C5.07331 21.165 5 21.4111 5 21.6628C5 22.0003 5.1317 22.3241 5.36612 22.5627C5.60054 22.8014 5.91848 22.9355 6.25 22.9355Z" fill="#2D2D41" />
                                                    </svg>
                                                </div>
                                                <div class="calendar">
                                                    <div class="calendar__month">
                                                        <div class="calendar__arrow_left calendar__month_left">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round" />
                                                            </svg>
                                                        </div>
                                                        <div class="calendar__month_text calendar__text"></div>
                                                        <div class="calendar__arrow_right calendar__month_right">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round" />
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
                                                <div class="calendar-from__active">
                                                    <input type="text" class="input date_end__input" placeholder="Дата до:" name="date_end" readonly>
                                                    <svg class="input-form__calendar" width="25" height="29" viewBox="0 0 25 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.5 22.9355C12.7472 22.9355 12.9889 22.8609 13.1945 22.721C13.4 22.5812 13.5602 22.3824 13.6549 22.1498C13.7495 21.9173 13.7742 21.6614 13.726 21.4145C13.6778 21.1676 13.5587 20.9408 13.3839 20.7628C13.2091 20.5848 12.9863 20.4636 12.7439 20.4145C12.5014 20.3654 12.2501 20.3906 12.0216 20.4869C11.7932 20.5833 11.598 20.7464 11.4607 20.9557C11.3233 21.165 11.25 21.4111 11.25 21.6628C11.25 22.0003 11.3817 22.3241 11.6161 22.5627C11.8505 22.8014 12.1685 22.9355 12.5 22.9355ZM18.75 22.9355C18.9972 22.9355 19.2389 22.8609 19.4445 22.721C19.65 22.5812 19.8102 22.3824 19.9049 22.1498C19.9995 21.9173 20.0242 21.6614 19.976 21.4145C19.9277 21.1676 19.8087 20.9408 19.6339 20.7628C19.4591 20.5848 19.2363 20.4636 18.9939 20.4145C18.7514 20.3654 18.5001 20.3906 18.2716 20.4869C18.0432 20.5833 17.848 20.7464 17.7107 20.9557C17.5733 21.165 17.5 21.4111 17.5 21.6628C17.5 22.0003 17.6317 22.3241 17.8661 22.5627C18.1005 22.8014 18.4185 22.9355 18.75 22.9355ZM18.75 17.8446C18.9972 17.8446 19.2389 17.77 19.4445 17.6301C19.65 17.4903 19.8102 17.2915 19.9049 17.0589C19.9995 16.8264 20.0242 16.5705 19.976 16.3236C19.9277 16.0767 19.8087 15.8499 19.6339 15.6719C19.4591 15.4939 19.2363 15.3727 18.9939 15.3236C18.7514 15.2745 18.5001 15.2997 18.2716 15.396C18.0432 15.4924 17.848 15.6555 17.7107 15.8648C17.5733 16.0741 17.5 16.3202 17.5 16.5719C17.5 16.9094 17.6317 17.2332 17.8661 17.4718C18.1005 17.7105 18.4185 17.8446 18.75 17.8446ZM12.5 17.8446C12.7472 17.8446 12.9889 17.77 13.1945 17.6301C13.4 17.4903 13.5602 17.2915 13.6549 17.0589C13.7495 16.8264 13.7742 16.5705 13.726 16.3236C13.6778 16.0767 13.5587 15.8499 13.3839 15.6719C13.2091 15.4939 12.9863 15.3727 12.7439 15.3236C12.5014 15.2745 12.2501 15.2997 12.0216 15.396C11.7932 15.4924 11.598 15.6555 11.4607 15.8648C11.3233 16.0741 11.25 16.3202 11.25 16.5719C11.25 16.9094 11.3817 17.2332 11.6161 17.4718C11.8505 17.7105 12.1685 17.8446 12.5 17.8446ZM21.25 2.57188H20V1.29916C20 0.961607 19.8683 0.637884 19.6339 0.399201C19.3995 0.160519 19.0815 0.0264282 18.75 0.0264282C18.4185 0.0264282 18.1005 0.160519 17.8661 0.399201C17.6317 0.637884 17.5 0.961607 17.5 1.29916V2.57188H7.5V1.29916C7.5 0.961607 7.3683 0.637884 7.13388 0.399201C6.89946 0.160519 6.58152 0.0264282 6.25 0.0264282C5.91848 0.0264282 5.60054 0.160519 5.36612 0.399201C5.1317 0.637884 5 0.961607 5 1.29916V2.57188H3.75C2.75544 2.57188 1.80161 2.97415 1.09835 3.6902C0.395088 4.40625 0 5.37742 0 6.39006V24.2082C0 25.2209 0.395088 26.1921 1.09835 26.9081C1.80161 27.6242 2.75544 28.0264 3.75 28.0264H21.25C22.2446 28.0264 23.1984 27.6242 23.9016 26.9081C24.6049 26.1921 25 25.2209 25 24.2082V6.39006C25 5.37742 24.6049 4.40625 23.9016 3.6902C23.1984 2.97415 22.2446 2.57188 21.25 2.57188ZM22.5 24.2082C22.5 24.5458 22.3683 24.8695 22.1339 25.1082C21.8995 25.3469 21.5815 25.481 21.25 25.481H3.75C3.41848 25.481 3.10054 25.3469 2.86612 25.1082C2.6317 24.8695 2.5 24.5458 2.5 24.2082V12.7537H22.5V24.2082ZM22.5 10.2082H2.5V6.39006C2.5 6.05252 2.6317 5.72879 2.86612 5.49011C3.10054 5.25143 3.41848 5.11734 3.75 5.11734H5V6.39006C5 6.72761 5.1317 7.05134 5.36612 7.29002C5.60054 7.5287 5.91848 7.66279 6.25 7.66279C6.58152 7.66279 6.89946 7.5287 7.13388 7.29002C7.3683 7.05134 7.5 6.72761 7.5 6.39006V5.11734H17.5V6.39006C17.5 6.72761 17.6317 7.05134 17.8661 7.29002C18.1005 7.5287 18.4185 7.66279 18.75 7.66279C19.0815 7.66279 19.3995 7.5287 19.6339 7.29002C19.8683 7.05134 20 6.72761 20 6.39006V5.11734H21.25C21.5815 5.11734 21.8995 5.25143 22.1339 5.49011C22.3683 5.72879 22.5 6.05252 22.5 6.39006V10.2082ZM6.25 17.8446C6.49723 17.8446 6.7389 17.77 6.94446 17.6301C7.15002 17.4903 7.31024 17.2915 7.40485 17.0589C7.49946 16.8264 7.52421 16.5705 7.47598 16.3236C7.42775 16.0767 7.3087 15.8499 7.13388 15.6719C6.95907 15.4939 6.73634 15.3727 6.49386 15.3236C6.25139 15.2745 6.00005 15.2997 5.77165 15.396C5.54324 15.4924 5.34801 15.6555 5.21066 15.8648C5.07331 16.0741 5 16.3202 5 16.5719C5 16.9094 5.1317 17.2332 5.36612 17.4718C5.60054 17.7105 5.91848 17.8446 6.25 17.8446ZM6.25 22.9355C6.49723 22.9355 6.7389 22.8609 6.94446 22.721C7.15002 22.5812 7.31024 22.3824 7.40485 22.1498C7.49946 21.9173 7.52421 21.6614 7.47598 21.4145C7.42775 21.1676 7.3087 20.9408 7.13388 20.7628C6.95907 20.5848 6.73634 20.4636 6.49386 20.4145C6.25139 20.3654 6.00005 20.3906 5.77165 20.4869C5.54324 20.5833 5.34801 20.7464 5.21066 20.9557C5.07331 21.165 5 21.4111 5 21.6628C5 22.0003 5.1317 22.3241 5.36612 22.5627C5.60054 22.8014 5.91848 22.9355 6.25 22.9355Z" fill="#2D2D41" />
                                                    </svg>
                                                </div>
                                                <div class="calendar">
                                                    <div class="calendar__month">
                                                        <div class="calendar__arrow_left calendar__month_left">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round" />
                                                            </svg>
                                                        </div>
                                                        <div class="calendar__month_text calendar__text"></div>
                                                        <div class="calendar__arrow_right calendar__month_right">
                                                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round" />
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
                                <div class="filter__input-form input-form">
                                    <label class="label__for-input" for="type">
                                        Загрузка
                                    </label>
                                    <div class="_select">
                                        <div class="_select__block">
                                            <input type="text" class="_select__show input" id="type" placeholder="Выберите из списка" disabled>
                                            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </div>
                                        <ul class="_select__list">
                                            <?
                                            foreach (Model::getAll('upload_type') as $value) {
                                                echo '<li class="_select__item">
                                                        <label for="upload_type_' . $value['upload_type_id'] . '">
                                                            ' . $value['name'] . '
                                                            <input name="upload_type" id="upload_type_' . $value['upload_type_id'] . '" value="' . $value['upload_type_id'] . '" type="radio" hidden>
                                                        </label>
                                                    </li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="filter__min-max">
                                    <div class="filter__price">
                                        <div class="filter__input-form input-form">
                                            <label class="label__for-input" for="">
                                                Цена <sup>р</sup>
                                            </label>
                                            <div class="filter__small-inputs">
                                                <input type="number" class="input" placeholder="от" name="price_min">
                                                <input type="number" class="input" placeholder="до" name="price_max">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__volume">
                                        <div class="filter__input-form input-form">
                                            <label class="label__for-input" for="">
                                                Объём <sup>м3</sup>
                                            </label>
                                            <div class="filter__small-inputs">
                                                <input type="number" class="input" placeholder="от" name="volume_min">
                                                <input type="number" class="input" placeholder="до" name="volume_max">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__mass">
                                        <div class="filter_input-form input-form">
                                            <label class="label__for-input" for="">
                                                Масса <sup>т</sup>
                                            </label>
                                            <div class="filter__small-inputs">
                                                <input type="number" class="input" placeholder="от" name="mass_min">
                                                <input type="number" class="input" placeholder="до" name="mass_max">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="filter__button button-dark" name="search_application" disabled>
                                    <svg width="1rem" height="1rem" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.6339 12.8664L11.4607 9.69323C12.1164 8.70509 12.5001 7.52195 12.5001 6.25006C12.5001 2.80378 9.69635 0 6.25006 0C2.80378 0 0 2.80378 0 6.25006C0 9.69635 2.80378 12.5001 6.25006 12.5001C7.52195 12.5001 8.70509 12.1164 9.69323 11.4607L12.8664 14.6339C13.3539 15.122 14.1464 15.122 14.6339 14.6339C15.122 14.1458 15.122 13.3545 14.6339 12.8664ZM1.87502 6.25006C1.87502 3.83754 3.83754 1.87502 6.25006 1.87502C8.66259 1.87502 10.6251 3.83754 10.6251 6.25006C10.6251 8.66259 8.66259 10.6251 6.25006 10.6251C3.83754 10.6251 1.87502 8.66259 1.87502 6.25006Z" fill="white" />
                                    </svg>
                                    Поиск
                                </button>
                                <button class="filter__reset-button" type="reset">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="15" height="15" fill="url(#pattern0)" fill-opacity="0.1" />
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_90_125" transform="scale(0.00195312)" />
                                            </pattern>
                                            <image id="image0_90_125" width="512" height="512" xlink:href="data:image/png;base64,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" />
                                        </defs>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="catalog catalog__index">
                            <div class="catalog__title">
                                <div class="page-title index__page-title">
                                    <span>Недавно добавленный: </span>
                                    <span class="index__page-title__selected">
                                        груз
                                    </span>
                                </div>
                            </div>
                            <div class="catalog__hints">
                                <ul class="catalog__hints_list index__hints_list hints">
                                    <li class="hint__item">
                                        <div class="hint__status status-recently"></div>
                                        <span>
                                            Недавно добавлены
                                        </span>
                                    </li>
                                    <li class="hint__item">
                                        <div class="hint__status status-24h"></div>
                                        <span>
                                            Добавлены более 24ч назад
                                        </span>
                                    </li>
                                    <li class="hint__item">
                                        <div class="hint__status status-48h"></div>
                                        <span>
                                            Добавлены более 48ч назад
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="catalog__table__service table__service">
                                <ul class="table__service_names">
                                    <li class="table__service_name"></li>
                                    <li class="table__service_name">
                                        Дата
                                    </li>
                                    <li class="table__service_name">
                                        Откуда - Куда
                                    </li>
                                    <li class="table__service_name">
                                        Оплата
                                    </li>
                                    <li class="table__service_name">
                                        Транспорт
                                    </li>
                                    <li class="table__service_name">
                                        Тип груза
                                    </li>
                                    <li class="table__service_name">
                                        Контакты
                                    </li>
                                </ul>
                                <ul class="table__service services cargo__list" id="application__list_index">
                                </ul>
                                <ul class="navigation-bottom"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?= renderFooter() ?>
    </div>
    <? require_once './source/components/script.php'; ?>
</body>

</html>