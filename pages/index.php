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
    <title>Главная</title>
</head>
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
                            <form class="catalog__filter filter block-default" method="POST">
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
                                        <div class="_select">
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
                                                        <label for="city_' . $value['city_id'] . '">
                                                            ' . $value['country'] . ', ' . $value['name'] . '
                                                            <input name="from" id="city_' . $value['city_id'] . '" hidden>
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
                                        <div class="_select">
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
                                                        <label for="city_' . $value['city_id'] . '">
                                                            ' . $value['country'] . ', ' . $value['name'] . '
                                                            <input name="to" id="city_' . $value['city_id'] . '" hidden>
                                                        </label>
                                                        </li>
                                                    ';
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
                                    <div class="_select">
                                        <div class="_select__block">
                                            <input type="text" class="_select__show input" id="type" placeholder="Выберите из списка" disabled>
                                            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                            </svg>                            
                                        </div>
                                        <ul class="_select__list">
                                            <? foreach (TransportUpload::get() as $value) {
                                                echo '<li class="_select__item">
                                                        <label for="transport_upload_' . $value['transport_upload_id'] . '">
                                                            ' . $value['name'] . '
                                                            <input name="transport_upload" id="transport_upload_' . $value['transport_upload_id'] . '" hidden>
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
                                            <div class="input-from__calendar-form">
                                                <input type="text" class="input date_start__input" placeholder="От" name="date_start">
                                                <div class="input-form__calendar button-dark">
                                                    <svg width="34" height="37" viewBox="0 0 34 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17 30.2727C17.3362 30.2727 17.6649 30.1741 17.9445 29.9893C18.224 29.8045 18.4419 29.5418 18.5706 29.2345C18.6993 28.9272 18.7329 28.589 18.6673 28.2628C18.6017 27.9366 18.4398 27.6369 18.2021 27.4017C17.9643 27.1665 17.6614 27.0063 17.3317 26.9414C17.0019 26.8765 16.6601 26.9098 16.3494 27.0371C16.0388 27.1644 15.7733 27.38 15.5865 27.6565C15.3997 27.9331 15.3 28.2583 15.3 28.5909C15.3 29.037 15.4791 29.4647 15.7979 29.7801C16.1167 30.0955 16.5491 30.2727 17 30.2727ZM25.5 30.2727C25.8362 30.2727 26.1649 30.1741 26.4445 29.9893C26.724 29.8045 26.9419 29.5418 27.0706 29.2345C27.1993 28.9272 27.2329 28.589 27.1673 28.2628C27.1017 27.9366 26.9398 27.6369 26.7021 27.4017C26.4643 27.1665 26.1614 27.0063 25.8317 26.9414C25.5019 26.8765 25.1601 26.9098 24.8494 27.0371C24.5388 27.1644 24.2733 27.38 24.0865 27.6565C23.8997 27.9331 23.8 28.2583 23.8 28.5909C23.8 29.037 23.9791 29.4647 24.2979 29.7801C24.6167 30.0955 25.0491 30.2727 25.5 30.2727ZM25.5 23.5455C25.8362 23.5455 26.1649 23.4468 26.4445 23.262C26.724 23.0772 26.9419 22.8146 27.0706 22.5072C27.1993 22.1999 27.2329 21.8618 27.1673 21.5355C27.1017 21.2093 26.9398 20.9096 26.7021 20.6744C26.4643 20.4392 26.1614 20.279 25.8317 20.2141C25.5019 20.1492 25.1601 20.1825 24.8494 20.3098C24.5388 20.4371 24.2733 20.6527 24.0865 20.9293C23.8997 21.2058 23.8 21.531 23.8 21.8636C23.8 22.3097 23.9791 22.7375 24.2979 23.0529C24.6167 23.3683 25.0491 23.5455 25.5 23.5455ZM17 23.5455C17.3362 23.5455 17.6649 23.4468 17.9445 23.262C18.224 23.0772 18.4419 22.8146 18.5706 22.5072C18.6993 22.1999 18.7329 21.8618 18.6673 21.5355C18.6017 21.2093 18.4398 20.9096 18.2021 20.6744C17.9643 20.4392 17.6614 20.279 17.3317 20.2141C17.0019 20.1492 16.6601 20.1825 16.3494 20.3098C16.0388 20.4371 15.7733 20.6527 15.5865 20.9293C15.3997 21.2058 15.3 21.531 15.3 21.8636C15.3 22.3097 15.4791 22.7375 15.7979 23.0529C16.1167 23.3683 16.5491 23.5455 17 23.5455ZM28.9 3.36364H27.2V1.68182C27.2 1.23577 27.0209 0.807995 26.7021 0.492593C26.3833 0.177191 25.9509 0 25.5 0C25.0491 0 24.6167 0.177191 24.2979 0.492593C23.9791 0.807995 23.8 1.23577 23.8 1.68182V3.36364H10.2V1.68182C10.2 1.23577 10.0209 0.807995 9.70208 0.492593C9.38327 0.177191 8.95087 0 8.5 0C8.04913 0 7.61673 0.177191 7.29792 0.492593C6.97911 0.807995 6.8 1.23577 6.8 1.68182V3.36364H5.1C3.7474 3.36364 2.45019 3.89521 1.49376 4.84142C0.53732 5.78762 0 7.07095 0 8.40909V31.9545C0 33.2927 0.53732 34.576 1.49376 35.5222C2.45019 36.4684 3.7474 37 5.1 37H28.9C30.2526 37 31.5498 36.4684 32.5062 35.5222C33.4627 34.576 34 33.2927 34 31.9545V8.40909C34 7.07095 33.4627 5.78762 32.5062 4.84142C31.5498 3.89521 30.2526 3.36364 28.9 3.36364ZM30.6 31.9545C30.6 32.4006 30.4209 32.8284 30.1021 33.1438C29.7833 33.4592 29.3509 33.6364 28.9 33.6364H5.1C4.64913 33.6364 4.21673 33.4592 3.89792 33.1438C3.57911 32.8284 3.4 32.4006 3.4 31.9545V16.8182H30.6V31.9545ZM30.6 13.4545H3.4V8.40909C3.4 7.96304 3.57911 7.53527 3.89792 7.21987C4.21673 6.90446 4.64913 6.72727 5.1 6.72727H6.8V8.40909C6.8 8.85514 6.97911 9.28291 7.29792 9.59832C7.61673 9.91372 8.04913 10.0909 8.5 10.0909C8.95087 10.0909 9.38327 9.91372 9.70208 9.59832C10.0209 9.28291 10.2 8.85514 10.2 8.40909V6.72727H23.8V8.40909C23.8 8.85514 23.9791 9.28291 24.2979 9.59832C24.6167 9.91372 25.0491 10.0909 25.5 10.0909C25.9509 10.0909 26.3833 9.91372 26.7021 9.59832C27.0209 9.28291 27.2 8.85514 27.2 8.40909V6.72727H28.9C29.3509 6.72727 29.7833 6.90446 30.1021 7.21987C30.4209 7.53527 30.6 7.96304 30.6 8.40909V13.4545ZM8.5 23.5455C8.83623 23.5455 9.16491 23.4468 9.44447 23.262C9.72403 23.0772 9.94193 22.8146 10.0706 22.5072C10.1993 22.1999 10.2329 21.8618 10.1673 21.5355C10.1017 21.2093 9.93983 20.9096 9.70208 20.6744C9.46433 20.4392 9.16142 20.279 8.83165 20.2141C8.50189 20.1492 8.16007 20.1825 7.84944 20.3098C7.5388 20.4371 7.2733 20.6527 7.0865 20.9293C6.8997 21.2058 6.8 21.531 6.8 21.8636C6.8 22.3097 6.97911 22.7375 7.29792 23.0529C7.61673 23.3683 8.04913 23.5455 8.5 23.5455ZM8.5 30.2727C8.83623 30.2727 9.16491 30.1741 9.44447 29.9893C9.72403 29.8045 9.94193 29.5418 10.0706 29.2345C10.1993 28.9272 10.2329 28.589 10.1673 28.2628C10.1017 27.9366 9.93983 27.6369 9.70208 27.4017C9.46433 27.1665 9.16142 27.0063 8.83165 26.9414C8.50189 26.8765 8.16007 26.9098 7.84944 27.0371C7.5388 27.1644 7.2733 27.38 7.0865 27.6565C6.8997 27.9331 6.8 28.2583 6.8 28.5909C6.8 29.037 6.97911 29.4647 7.29792 29.7801C7.61673 30.0955 8.04913 30.2727 8.5 30.2727Z" fill="white"/>
                                                    </svg>                                        
                                                </div>
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
                                            <div class="input-from__calendar-form">
                                                <input type="text" class="input date_end__input" placeholder="До" name="date_end">
                                                <div class="input-form__calendar button-dark">
                                                    <svg width="34" height="37" viewBox="0 0 34 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17 30.2727C17.3362 30.2727 17.6649 30.1741 17.9445 29.9893C18.224 29.8045 18.4419 29.5418 18.5706 29.2345C18.6993 28.9272 18.7329 28.589 18.6673 28.2628C18.6017 27.9366 18.4398 27.6369 18.2021 27.4017C17.9643 27.1665 17.6614 27.0063 17.3317 26.9414C17.0019 26.8765 16.6601 26.9098 16.3494 27.0371C16.0388 27.1644 15.7733 27.38 15.5865 27.6565C15.3997 27.9331 15.3 28.2583 15.3 28.5909C15.3 29.037 15.4791 29.4647 15.7979 29.7801C16.1167 30.0955 16.5491 30.2727 17 30.2727ZM25.5 30.2727C25.8362 30.2727 26.1649 30.1741 26.4445 29.9893C26.724 29.8045 26.9419 29.5418 27.0706 29.2345C27.1993 28.9272 27.2329 28.589 27.1673 28.2628C27.1017 27.9366 26.9398 27.6369 26.7021 27.4017C26.4643 27.1665 26.1614 27.0063 25.8317 26.9414C25.5019 26.8765 25.1601 26.9098 24.8494 27.0371C24.5388 27.1644 24.2733 27.38 24.0865 27.6565C23.8997 27.9331 23.8 28.2583 23.8 28.5909C23.8 29.037 23.9791 29.4647 24.2979 29.7801C24.6167 30.0955 25.0491 30.2727 25.5 30.2727ZM25.5 23.5455C25.8362 23.5455 26.1649 23.4468 26.4445 23.262C26.724 23.0772 26.9419 22.8146 27.0706 22.5072C27.1993 22.1999 27.2329 21.8618 27.1673 21.5355C27.1017 21.2093 26.9398 20.9096 26.7021 20.6744C26.4643 20.4392 26.1614 20.279 25.8317 20.2141C25.5019 20.1492 25.1601 20.1825 24.8494 20.3098C24.5388 20.4371 24.2733 20.6527 24.0865 20.9293C23.8997 21.2058 23.8 21.531 23.8 21.8636C23.8 22.3097 23.9791 22.7375 24.2979 23.0529C24.6167 23.3683 25.0491 23.5455 25.5 23.5455ZM17 23.5455C17.3362 23.5455 17.6649 23.4468 17.9445 23.262C18.224 23.0772 18.4419 22.8146 18.5706 22.5072C18.6993 22.1999 18.7329 21.8618 18.6673 21.5355C18.6017 21.2093 18.4398 20.9096 18.2021 20.6744C17.9643 20.4392 17.6614 20.279 17.3317 20.2141C17.0019 20.1492 16.6601 20.1825 16.3494 20.3098C16.0388 20.4371 15.7733 20.6527 15.5865 20.9293C15.3997 21.2058 15.3 21.531 15.3 21.8636C15.3 22.3097 15.4791 22.7375 15.7979 23.0529C16.1167 23.3683 16.5491 23.5455 17 23.5455ZM28.9 3.36364H27.2V1.68182C27.2 1.23577 27.0209 0.807995 26.7021 0.492593C26.3833 0.177191 25.9509 0 25.5 0C25.0491 0 24.6167 0.177191 24.2979 0.492593C23.9791 0.807995 23.8 1.23577 23.8 1.68182V3.36364H10.2V1.68182C10.2 1.23577 10.0209 0.807995 9.70208 0.492593C9.38327 0.177191 8.95087 0 8.5 0C8.04913 0 7.61673 0.177191 7.29792 0.492593C6.97911 0.807995 6.8 1.23577 6.8 1.68182V3.36364H5.1C3.7474 3.36364 2.45019 3.89521 1.49376 4.84142C0.53732 5.78762 0 7.07095 0 8.40909V31.9545C0 33.2927 0.53732 34.576 1.49376 35.5222C2.45019 36.4684 3.7474 37 5.1 37H28.9C30.2526 37 31.5498 36.4684 32.5062 35.5222C33.4627 34.576 34 33.2927 34 31.9545V8.40909C34 7.07095 33.4627 5.78762 32.5062 4.84142C31.5498 3.89521 30.2526 3.36364 28.9 3.36364ZM30.6 31.9545C30.6 32.4006 30.4209 32.8284 30.1021 33.1438C29.7833 33.4592 29.3509 33.6364 28.9 33.6364H5.1C4.64913 33.6364 4.21673 33.4592 3.89792 33.1438C3.57911 32.8284 3.4 32.4006 3.4 31.9545V16.8182H30.6V31.9545ZM30.6 13.4545H3.4V8.40909C3.4 7.96304 3.57911 7.53527 3.89792 7.21987C4.21673 6.90446 4.64913 6.72727 5.1 6.72727H6.8V8.40909C6.8 8.85514 6.97911 9.28291 7.29792 9.59832C7.61673 9.91372 8.04913 10.0909 8.5 10.0909C8.95087 10.0909 9.38327 9.91372 9.70208 9.59832C10.0209 9.28291 10.2 8.85514 10.2 8.40909V6.72727H23.8V8.40909C23.8 8.85514 23.9791 9.28291 24.2979 9.59832C24.6167 9.91372 25.0491 10.0909 25.5 10.0909C25.9509 10.0909 26.3833 9.91372 26.7021 9.59832C27.0209 9.28291 27.2 8.85514 27.2 8.40909V6.72727H28.9C29.3509 6.72727 29.7833 6.90446 30.1021 7.21987C30.4209 7.53527 30.6 7.96304 30.6 8.40909V13.4545ZM8.5 23.5455C8.83623 23.5455 9.16491 23.4468 9.44447 23.262C9.72403 23.0772 9.94193 22.8146 10.0706 22.5072C10.1993 22.1999 10.2329 21.8618 10.1673 21.5355C10.1017 21.2093 9.93983 20.9096 9.70208 20.6744C9.46433 20.4392 9.16142 20.279 8.83165 20.2141C8.50189 20.1492 8.16007 20.1825 7.84944 20.3098C7.5388 20.4371 7.2733 20.6527 7.0865 20.9293C6.8997 21.2058 6.8 21.531 6.8 21.8636C6.8 22.3097 6.97911 22.7375 7.29792 23.0529C7.61673 23.3683 8.04913 23.5455 8.5 23.5455ZM8.5 30.2727C8.83623 30.2727 9.16491 30.1741 9.44447 29.9893C9.72403 29.8045 9.94193 29.5418 10.0706 29.2345C10.1993 28.9272 10.2329 28.589 10.1673 28.2628C10.1017 27.9366 9.93983 27.6369 9.70208 27.4017C9.46433 27.1665 9.16142 27.0063 8.83165 26.9414C8.50189 26.8765 8.16007 26.9098 7.84944 27.0371C7.5388 27.1644 7.2733 27.38 7.0865 27.6565C6.8997 27.9331 6.8 28.2583 6.8 28.5909C6.8 29.037 6.97911 29.4647 7.29792 29.7801C7.61673 30.0955 8.04913 30.2727 8.5 30.2727Z" fill="white"/>
                                                    </svg>                                        
                                                </div>
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
                                <div class="filter__input-form input-form">
                                    <label class="label__for-input" for="type">
                                        Загрузка
                                    </label>
                                    <div class="_select">
                                        <div class="_select__block">
                                            <input type="text" class="_select__show input" id="type" placeholder="Выберите из списка" disabled>
                                            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
                                            </svg>                            
                                        </div>
                                        <ul class="_select__list">
                                            <? foreach (Model::get('upload_type') as $value) {
                                                echo '<li class="_select__item">
                                                        <label for="upload_type' . $value['transport_upload_id'] . '">
                                                            ' . $value['name'] . '
                                                            <input name="upload_type" id="upload_type_' . $value['transport_upload_id'] . '" hidden>
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
                                                <input type="number" class="input" placeholder="От" name="price_min">
                                                <input type="number" class="input" placeholder="До" name="price_max">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__volume">
                                        <div class="filter__input-form input-form">
                                            <label class="label__for-input" for="">
                                                Объём <sup>м3</sup>
                                            </label>
                                            <div class="filter__small-inputs">
                                                <input type="number" class="input" placeholder="От" name="volume_min">
                                                <input type="number" class="input" placeholder="До" class="volume_start">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter__mass">
                                        <div class="filter_input-form input-form">
                                            <label class="label__for-input" for="">
                                                Масса <sup>т</sup>
                                            </label>
                                            <div class="filter__small-inputs">
                                                <input type="number" class="input" placeholder="От" name="mass_min">
                                                <input type="number" class="input" placeholder="До" name="mass_max">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="filter__button button-dark">
                                    Поиск
                                </button>
                            </form>
                        </div>

                        <div class="catalog catalog__index">
                            <div class="catalog__title">
                                <div class="page-title index__page-title">
                                    Недавно добавленный груз
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
                                        <div class="hint__status recently-24h"></div>
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
                                        Откуда - куда
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
                                    <!-- <li class="service__item">
                                        <div class="service__status status-recently"></div>
                                        <div class="service__date">
                                            15 апр - 23 апр
                                        </div>
                                        <div class="service__way">
                                            <span class="service__way_item">
                                                <img src="img/flag_ukraine.png" alt="">
                                                <span>
                                                    Донецк
                                                </span>
                                            </span>
                                            <span class="service__way_item">
                                                <img src="img/flag_belarus.png" alt="">
                                                <span>
                                                    Минск
                                                </span>
                                            </span>
                                        </div>
                                        <div class="service__payment">
                                            Запрос цены
                                        </div>
                                        <div class="service__transport">
                                            Тент
                                        </div>
                                        <button class="service__button button-grey">
                                            Посмотреть
                                        </button>
                                        <button class="service__button button-dark">
                                            Связаться
                                        </button>
                                    </li> -->
                                </ul>
                                <ul class="navigation-bottom">
                                    <li class="navigation-bottom_item">
                                        <a class="navigation-bottom_href _active" href="">
                                            1
                                        </a>
                                    </li>
                                    <li class="navigation-bottom_item">
                                        <a class="navigation-bottom_href" href="">
                                            2
                                        </a>
                                    </li>
                                    <li class="navigation-bottom_item">
                                        <a class="navigation-bottom_href" href="">
                                            3
                                        </a>
                                    </li>
                                    <li class="navigation-bottom_item">
                                        <a class="navigation-bottom_href" href="">
                                            4
                                        </a>
                                    </li>
                                    <li class="navigation-bottom_item">
                                        <a class="navigation-bottom_href" href="">
                                            ...
                                        </a>
                                    </li>
                                    <li class="navigation-bottom_item">
                                        <a class="navigation-bottom_href" href="">
                                            Следующая страница
                                        </a>
                                    </li>
                                </ul>
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