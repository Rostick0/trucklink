<?

$path_page = __DIR__ . './../api/pages';

switch ($uri_api_type) {
    case '/application':
        $path_page .= '/application.php';
        break;
    case '/user_avatar':
        $path_page .= '/user_avatar.php';
        break;
    default:
        $path_page .= '/index.php';
}

if (!file_exists($path_page)) {
    $path_page = __DIR__ . './../api/pages/index.php';
}

require_once $path_page;

?>