<?

$path_page = './view/pages';

switch ($uri_short) {
    case '/api':
        $path_page = './api/index.php';
        break;
    case '/socket':
        $path_page = './socket/index.php';
        break;
    case '/registration':
        $path_page .= '/authorization/registration.php';
        break;
    case '/login':
        $path_page .= '/authorization/login.php';
        break;
    case '/create':
        $path_page .= '/create/create.php';
        break;
    case '/profile':
        $path_page .= '/profile/profile.php';
        break;
    case '/profile_info':
        $path_page .= '/profile/profile_info.php';
        break;
    case '/application':
        $path_page .= '/application.php';
        break;
    case '/application_edit':
        $path_page .= '/edit/application_edit.php';
        break;
    case '/chat':
        $path_page .= '/chat/chat.php';
        break;
    case '/admin':
        $path_page .= '/admin/index.php';
        break;
    default:
        $path_page .= '/index.php';
}

if (!file_exists($path_page)) {
    $path_page = './view/pages/index.php';
}

require_once $path_page;
