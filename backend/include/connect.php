<?

$db = new mysqli('localhost', 'root', 'root', 'trucklink_db');

$db->set_charset("UTF-8");

if (!$db) {
    die('Не работает база данных');
}

?>