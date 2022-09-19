<?
$from = City::getWithCountryOne($cargo['from']);
$to = City::getWithCountryOne($cargo['to']);
$transport_upload = Model::get('transport_upload', 'transport_upload_id', $cargo['transport_upload_id']);
$upload_type = Model::get('upload_type', 'upload_type_id', $cargo['upload_type_id']);
$user = Model::get('user', 'user_id', $cargo['user_id']);
$user_activity = Model::get('user_activity', 'user_activity_id', $user['activity_id']);
$messengers = Model::getAll('user_messenger', 'user_id', $cargo['user_id']);
$city_cords_from = Model::get('city_coordinate', 'city_id', $from['city_id']);
$city_cords_to = Model::get('city_coordinate', 'city_id', $to['city_id']);

var_dump($city_cords_from);
?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Заявка на груз #{$cargo['application_id']}") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Заявка на груз #{$cargo['application_id']}") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                    <div class="application-flex">
                        <? if ($cargo['is_hide']) : ?>
                            <div class="application__is-hide">
                                Объявление скрыто
                            </div>
                        <? endif; ?>
                        <div class="application">
                            <div class="page-title">
                                Информация о транспорте
                            </div>
                            <div class="application__inner block-default">
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
                                <? if ($cargo['description']) : ?>
                                    <div class="application__item">
                                        <div class="application__item_title middle-title">
                                            Комментарий
                                        </div>
                                        <div class="application__item_info">
                                            <?= $cargo['description'] ?>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <div class="application__item">
                                    <div id="map" style="height:250px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="client">
                            <div class="page-title">
                                Контакты
                            </div>
                            <div class="application__client">
                                <div class="client__avatar">
                                    <a class="client__href" href="/profile?id=<?= $user['user_id'] ?>">
                                        <div class="client__image">
                                            <?= renderAvatar($classFirst = 'client__img', $classSecound = 'client__img', $avatar = $user['avatar'], $name = $user['name']); ?>
                                        </div>
                                    </a>
                                    <a class="client__contact_href" href="/chat?id=<?= $user['user_id'] ?>">
                                        <div class="client__contact_button button-dark">
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path style="fill: none !important;" d="M18.4701 16.83L18.8601 19.99C18.9601 20.82 18.0701 21.4 17.3601 20.97L13.1701 18.48C12.7101 18.48 12.2601 18.45 11.8201 18.39C12.5601 17.52 13.0001 16.42 13.0001 15.23C13.0001 12.39 10.5401 10.09 7.50009 10.09C6.34009 10.09 5.2701 10.42 4.3801 11C4.3501 10.75 4.34009 10.5 4.34009 10.24C4.34009 5.68999 8.29009 2 13.1701 2C18.0501 2 22.0001 5.68999 22.0001 10.24C22.0001 12.94 20.6101 15.33 18.4701 16.83Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path style="fill: none !important;" d="M13 15.23C13 16.42 12.56 17.5201 11.82 18.3901C10.83 19.5901 9.26 20.36 7.5 20.36L4.89 21.91C4.45 22.18 3.89 21.81 3.95 21.3L4.2 19.3301C2.86 18.4001 2 16.91 2 15.23C2 13.47 2.94 11.9201 4.38 11.0001C5.27 10.4201 6.34 10.0901 7.5 10.0901C10.54 10.0901 13 12.39 13 15.23Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span>
                                                Написать сообщение
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="client__inner client__inner_first block-default">
                                    <ul class="client-data__list">
                                        <? if ($user['name']) : ?>
                                            <li class="client-data__item">
                                                <div class="client-data__name">
                                                    ФИО
                                                </div>
                                                <div class="client-data__value">
                                                    <?= $user['name'] ?>
                                                </div>
                                            </li>
                                        <? endif; ?>
                                        <? if ($user['telephone']) : ?>
                                            <li class="client-data__item">
                                                <div class="client-data__name">
                                                    Телефон
                                                </div>
                                                <div class="client-data__value">
                                                    <?= $user['telephone'] ?>
                                                </div>
                                            </li>
                                        <? endif; ?>
                                        <? if ($user['email']) : ?>
                                            <li class="client-data__item">
                                                <div class="client-data__name">
                                                    E-mail
                                                </div>
                                                <div class="client-data__value">
                                                    <?= $user['email'] ?>
                                                </div>
                                            </li>
                                        <? endif; ?>
                                        <li class="client-data__item">
                                            <div class="client-data__name">
                                                Страна
                                            </div>
                                            <div class="client-data__value">
                                                Украина
                                            </div>
                                        </li>
                                        <li class="client-data__item">
                                            <div class="client-data__name">
                                                Город
                                            </div>
                                            <div class="client-data__value">
                                                Луганск
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="client__inner client__inner_second block-default">
                                <div class="client__title">
                                    О компании
                                </div>
                                <ul class="client-data__list">
                                    <? if ($user['organization']) : ?>
                                        <li class="client-data__item">
                                            <div class="client-data__name">
                                                Название
                                            </div>
                                            <div class="client-data__value">
                                                <?= $user['organization'] ?>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                    <li class="client-data__item">
                                        <div class="client-data__name">
                                            ИНН
                                        </div>
                                        <div class="client-data__value">
                                            6449013711
                                        </div>
                                    </li>
                                    <? if ($user['additional_telephone']) : ?>
                                        <li class="client-data__item">
                                            <div class="client-data__name">
                                                Дополнительные контакты
                                            </div>
                                            <div class="client-data__value">
                                                <?= $user['additional_telephone'] ?>
                                            </div>
                                        </li>
                                    <? endif; ?>
                                    <li class="client-data__item">
                                        <div class="client-data__name">
                                            Сайт
                                        </div>
                                        <div class="client-data__value">
                                            www.piptransit.ua
                                        </div>
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
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script defer>
        const lat = <?= $city_cords_from['latitude'] ?>;
        const lon = <?= $city_cords_from['longitude'] ?>;
        const zoom = 18;

        const fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
        const toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        const position = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);

        map = new OpenLayers.Map("map");
        const mapnik = new OpenLayers.Layer.OSM();
        map.addLayer(mapnik);

        const markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(position));

        map.setCenter(position, zoom);
    </script>
    <? require_once './source/components/script.php' ?>
</body>

</html>