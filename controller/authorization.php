<?

class AuthorizationController {
    public static function get($login, $password, $is_remembered) {
        $login = protectionData($login);
        $password = protectionData($password);

        $errors = [];

        $authorization = Model::get('authorization', 'login', $login);

        if (!$authorization) {
            $errors[] = [
                'type' => 'login',
                'error' => 'Данного аккаунта не существует'
            ];
        }

        $password_hash = $authorization['password'];

        if (password_verify($password, $password_hash)) {
            $errors[] = [
                'type' => 'password',
                'error' => 'Неправильный пароль'
            ];
        }

        if ($_SESSION['authorization_lock'] > 3) {
            if (!$_SESSION['authorization_lock_time']) {
                $_SESSION['authorization_lock_time'] = $_SERVER['REQUEST_TIME'] + 600; 
            }
            
            if ($_SESSION['authorization_lock_time'] > $_SERVER['REQUEST_TIME']) {
                $errors[] = [
                    'type' => 'lock',
                    'error' => 'Неправильный пароль'
                ];
            }
        }

        if (!empty($errors)) {
            $_SESSION['authorization_lock'] += 1;
            $_SESSION['authorization'] = $errors;
            return;
        }

        $_SESSION['authorization'] = null;

        $session_token = $authorization['session_token'];

        $_SESSION['user']['id'] = $authorization['user_id'];

        if ($is_remembered) {
            setcookie("session_token", $session_token, time()+ 60 * 60 * 24 * 30);
        }
    }
}

if (isset($_REQUEST['login_button'])) {
    var_dump($_REQUEST);
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $is_remembered = $_REQUEST['is_remembered'];

    AuthorizationController::get($login, $password, $is_remembered);
}

?>