<?

$path_page = "./view/pages";

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

var_dump(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
var_dump($uri_short);

require_once $path_page;
