<?

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_short = '/' . explode('/', $uri)[1];

?>