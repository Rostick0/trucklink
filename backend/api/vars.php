<?

$uri_api_type = '/' . explode('/', $uri)[2];
$limit = (int) $_GET['limit'];
$offset = (int) $_GET['offset'];

$http_method = $_SERVER['REQUEST_METHOD'];

?>