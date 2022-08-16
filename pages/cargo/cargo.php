<?

$id = (int) $_GET['id'];
$cargo = Application::getCargoOne($id);

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
                                    <a href="/cargo_create">
                                        <button class="catalog__button_add button-yellow">
                                            Добавить груз
                                        </button>
                                    </a>
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
                                    Откуда - куда
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
        </main>
    <?= renderFooter() ?>
    </div>
    <? require_once './source/components/script.php'; ?>
</body>
</html>