<?
$from = City::getWithCountryOne($cargo['from']);
$to = City::getWithCountryOne($cargo['to']);
$transport_upload = Model::get('transport_upload', 'transport_upload_id', $cargo['transport_upload_id']);
$upload_type = Model::get('upload_type', 'upload_type_id', $cargo['upload_type_id']);
$user = Model::get('user', 'user_id', $cargo['user_id']);
$user_activity = Model::get('user_activity', 'user_activity_id', $user['activity_id']);
$messengers = Model::getAll('user_messenger', 'user_id', $cargo['user_id']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php' ?>
    <title>Заявка на транспорт #<?= $cargo['application_id'] ?></title>
</head>

<body>
    <div class="wrapper">
        <?= renderHeader("Заявка на транспорт #{$cargo['application_id']}") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>
                    <div class="application-grid">
                        <div class="page-title">
                            Информация о транспорте
                        </div>
                        <div class="page-title">
                            Контакты
                        </div>
                        <div class="application block-default">
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Заявка на транспорт
                                </div>
                                <div class="application__item_info">
                                    <ul class="tranport__additional_info additional_info">
                                        <li class="additional_info__item">
                                            ID Заявки: <?= $cargo['application_id'] ?>
                                        </li>
                                        <li class="additional_info__item">
                                            <?= normalizeDateTime($cargo['date_created'], true); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Откуда — Куда
                                </div>
                                <div class="application__item_info">
                                    <div class="application__location">
                                        <div class="application__city">
                                            <?= showFlag($to['country']) ?> <?= $from['country'] . ", " . $from['city'] ?>
                                        </div>
                                        <span>
                                            —
                                        </span>
                                        <div class="application__city">
                                            <?= showFlag($to['country']) ?> <?= $to['country'] . ", " . $to['city'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Дата загрузки
                                </div>
                                <div class="application__item_info">
                                    <?= normalizeDate($cargo['date_start']) ?> — <?= normalizeDate($cargo['date_end']) ?>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Тип транспорта
                                </div>
                                <div class="application__item_info">
                                    <?= $transport_upload['name'] ?>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Вид загрузки
                                </div>
                                <div class="application__item_info">
                                    <?= $upload_type['name'] ?>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Оплата
                                </div>
                                <div class="application__item_info">
                                    <?= $cargo['price'] ? $cargo['price'] . ' руб' : 'по запросу' ?>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Дополнительная информация
                                </div>
                                <div class="application__item_info">
                                    <ul class="tranport__additional_info additional_info">
                                        <li class="additional_info__item">
                                            объем: <?= $cargo['volume'] ?>м<sup>3</sup>
                                        </li>
                                        <li class="additional_info__item">
                                            масса: <?= $cargo['weight'] ?><sup>т</sup>
                                        </li>
                                        <li class="additional_info__item">
                                            высота: <?= $cargo['height'] ?><sup>м</sup>
                                        </li>
                                        <li class="additional_info__item">
                                            ширина: <?= $cargo['width'] ?><sup>м</sup>
                                        </li>
                                        <li class="additional_info__item">
                                            длинна: <?= $cargo['length'] ?><sup>м</sup>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="application__item">
                                <div class="application__item_title middle-title">
                                    Комментарий
                                </div>
                                <div class="application__item_info">
                                    <?= $cargo['description'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="application__client client block-default">
                            <div class="client__inner">
                                <div class="client__info">
                                    <div class="client__text">
                                        <div class="client__activity">
                                            <?= $user['organization'] ? $user['organization'] : $user['name'] ?>
                                        </div>
                                        <a class="client__href" href="profile?id=<?= $user['user_id'] ?>">
                                            Посмотреть профиль
                                        </a>
                                    </div>
                                    <div class="client__image">
                                        <img class="client__img" src="./source/static/img/user_image.png" alt="">
                                    </div>
                                </div>
                                <ul class="client__contacts">
                                    <li class="client__contact">
                                        <a class="client__contact_href" href="">
                                            <button class="client__contact_button client__contact_number button">
                                                <?= hideTelephone($user['telephone']) ?>
                                                <span class="client__contact_button_hint">
                                                    нажмите, чтобы узнать
                                                </span>
                                            </button>
                                        </a>
                                    </li>
                                    <li class="client__contact">
                                        <a class="client__contact_href" href="">
                                            <button class="client__contact_button button-dark">
                                                Написать сообщение
                                            </button>
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
    <? require_once './source/components/script.php' ?>
</body>

</html>