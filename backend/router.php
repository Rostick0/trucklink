<?

$path_page = './view/pages';

switch ($uri_short) {
    case '/registration':
        $path_page .= '/registration.php';
        break;
    case '/login':
        $path_page .= '/login.php';
        break;
        case '/create':
            $path_page .= '/create.php';
            break;
    default:
        $path_page .= '/index.php';
}

if (!file_exists($path_page)) {
    $path_page = './view/pages/index.php';
}

require_once $path_page;

?>