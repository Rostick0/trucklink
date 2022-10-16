<?

$path_page = './view/pages';

switch ($uri_short) {
    case '/api':
        $path_page = './api/index.php';
        break;
    case '/registration':
        $path_page .= '/registration.php';
        break;
    case '/login':
        $path_page .= '/login.php';
        break;
    case '/create':
        $path_page .= '/create/create.php';
        break;
    case '/profile':
        $path_page .= '/profile.php';
        break;
    default:
        $path_page .= '/index.php';
}

if (!file_exists($path_page)) {
    $path_page = './view/pages/index.php';
}

require_once $path_page;

?>