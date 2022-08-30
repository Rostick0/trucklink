<?

class AuthorizationController {
    public static function get($login, $password, $is_remembered) {
        $error = false;

        $authorization = Model::get('authorization', 'login', $login);

        if (!$authorization) {
            $_SESSION['error_login'] = "Данного аккаунта не существует";

            $error = true;
        }

        $password_hash = $authorization['password'];

        if (!password_verify($password, $password_hash)) {
            $_SESSION['error_password'] = "Неправильный пароль";

            $error = true;
        }

        if ($_SESSION['authorization_lock'] > 5) {
            if (!$_SESSION['authorization_lock_time']) {
                $_SESSION['authorization_lock_time'] = $_SERVER['REQUEST_TIME'] + 300;
            }
            
            if ($_SESSION['authorization_lock_time'] > $_SERVER['REQUEST_TIME']) {
                $_SESSION['error_login'] = "Попробуйте войти через 5 минут";

                $error = true;
            }
        }

        if ($error) {
            $_SESSION['authorization_lock'] += 1;
            return;
        }

        $_SESSION['error_login'] = null;
        $_SESSION['error_password'] = null;

        $_SESSION['user']['id'] = $authorization['user_id'];
        // setcookie();

        AuthorizationSession::create($_SERVER['REMOTE_HOST'], $_SERVER['HTTP_USER_AGENT'], $authorization['user_id']);

        Router::location("profile?id={$authorization['user_id']}");

        if ($is_remembered) {
            $session_token = $authorization['session_token'];
            setcookie("session_token", $session_token, time()+ 60 * 60 * 24 * 30);
        }
    }
}

if (isset($_REQUEST['login_button'])) {
    $login =  protectionData($_REQUEST['login']);
    $password = protectionData($_REQUEST['password']);
    $is_remembered = (boolean) $_REQUEST['is_remembered'];

    AuthorizationController::get($login, $password, $is_remembered);
}

?>