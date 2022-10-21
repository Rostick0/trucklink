<?

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_short = '/' . explode('/', $uri)[1];

$MONTHS = [
    'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
];

$EMAIL = 'support@cm31563.tmweb.ru';
