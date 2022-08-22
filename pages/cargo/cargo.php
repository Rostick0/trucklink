<?

$id = (int) $_GET['id'];
$cargo = Application::getApplicationOne($id);

if ($cargo && $cargo['application_type_id'] == 1) {
    require_once './pages/cargo/cargo_info.php';
    die();
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php'; ?>
    <title>Заяки</title>
</head>
<body>
    <div class="wrapper">
        <?= renderHeader("Заяки") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                        <div class="catalog">
                            <div class="catalog__title">
                                <div class="page-title">
                                    Грузы
                                </div>
                                    <div class="small-title">
                                    Заявки на отправку грузов
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
                                    Подробнее
                                </li>
                                <li class="table__service_name">
                                    Транспорт
                                </li>
                                <li class="table__service_name">
                                    Оплата
                                </li>
                                <li class="table__service_name">
                                    Контакты
                                </li>
                            </ul>
                            <ul class="table__service services cargo__list">
                            </ul>
                            <ul class="navigation-bottom">
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