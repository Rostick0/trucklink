<?

require_once './controller/session.php';

require_once './include/connect.php';

require_once './model/globals.php';

require_once './global/vars.php';
require_once './global/functions.php';

require_once './router/router.php';

require_once './model/user_activity.php';
require_once './controller/user_activity.php';

require_once './model/authorization_session.php';

require_once './model/authorization.php';
require_once './controller/authorization.php';

require_once './model/certificate.php';

require_once './model/user_messenger.php';

require_once './model/user.php';
require_once './controller/user.php';

require_once './model/city.php';

require_once './model/transport_upload.php';

require_once './model/user_messenger.php';

require_once './model/authorization_session.php';

require_once './model/application.php';
require_once './controller/application.php';

require_once './model/message.php';

require_once './model/chat.php';
require_once './controller/chat.php';

require_once './controller/application_search.php';

require_once './http/functions.php';

require_once './source/components/layout/header.php';
require_once './source/components/layout/footer.php';
require_once './source/components/layout/head.php';
require_once './source/components/UI/navigation_top.php';

require_once './hooks/session.php';

if ($_GET['http']) {
    require_once "./http/index.php";
    die();
}

if ($_GET['path'] || $_SERVER['REQUEST_URI'] === '/' || $_GET['type'] === 'transport') {
    require_once './pages/require_page.php';
}

require_once './hooks/local_socket.php';

?>