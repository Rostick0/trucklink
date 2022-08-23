<?

$id = (int) $_GET['id'];
$cargo = Application::getApplicationOne($id);

if ($cargo['application_type_id'] == 2) {
    require_once './pages/transport/transport_info.php';
    die();
}

?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Транспорт") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Транспорт") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                        <div class="catalog">
                            <div class="catalog__title">
                                <div class="page-title">
                                    Транспорт
                                </div>
                                    <div class="small-title">
                                        Заявки на транспорт
                                    </div>
                                </div>
                                <div class="catalog__hints">
                                    <ul class="catalog__hints_list hints">
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
                                <?
                                    require_once './source/components/UI/filter_catalog.php'
                                ?>
                        <div class="catalog__table__service table__service mt-3">
                            <ul class="table__service_names">
                                <li class="table__service_name"></li>
                                <li class="table__service_name">
                                    Дата
                                </li>
                                <li class="table__service_name">
                                    Откуда - Куда
                                </li>
                                <li class="table__service_name">
                                    Тип загрузки
                                </li>
                                <li class="table__service_name">
                                    Транспорт
                                </li>
                                <li class="table__service_name">
                                    Подробнее
                                </li>
                                <li class="table__service_name">
                                    Контакты
                                </li>
                            </ul>
                            <ul class="table__service services transport__list">

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
        </main>
    <?= renderFooter() ?>
    </div>
    <? require_once './source/components/script.php'; ?>
</body>
</html>