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
                            <div class="index__filter">
                                <?
                                    require_once './source/components/UI/filter_catalog.php'
                                ?>
                            </div>
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