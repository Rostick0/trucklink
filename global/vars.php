<?

$month_short = [
    'янв',
    'фев',
    'мар',
    'апр',
    'май',
    'июн',
    'июл',
    'авг',
    'сен',
    'окт',
    'ноя',
    'дек'
];

$user = null;

if ($_SESSION['user']['id']) {
    $user = Model::get('user', 'user_id', $_SESSION['user']['id']);
}

define('EARTH_RADIUS', 6372795);

?>