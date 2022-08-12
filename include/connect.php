<?

$mysqli = new mysqli('127.0.0.1', 'root', '', 'trucklink');

if (!$mysqli) {
    die("Не работает доступ к бд");
}

?>