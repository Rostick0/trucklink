<?

class UserController {
    public static function create($login, $password, $email, $name, $telephone, $additional_telephone, $about, $activity_id, $organization, $messengers, $img, $password_confirm) {
        $login = protectionData($login);
        $password = protectionData($password);
        $password_confirm = protectionData($password_confirm);
        $email = protectionData($email);
        $name = protectionData($name);
        $telephone = protectionData($telephone);
        $additional_telephone = protectionData($additional_telephone);
        $about = protectionData($about);
        $activity_id = (int) ($activity_id);
        $organization = protectionData($organization);

        $error = false;

        if (strlen($login) < 3) {
            $_SESSION['error_login'] = "Логин меньше 3 символов";
            $error = true;
        } else if (Model::count('authorization', 'login', $login) != 0) {
            $_SESSION['error_login'] = "Логин уже существует";
            $error = true;
        }

        if (strlen($password) < 5) {
            $_SESSION['error_password'] = "Пароль меньше 5 символов";
            $error = true;
        }

        if ($password != $password_confirm) {
            $_SESSION['error_password'] = "Пароли не совпадают";
            $error = true;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_email'] = "Неправильная почта";
            $error = true;
        }

        // if (!preg_match("", $telephone)) {
        //     $_SESSION['error_telephone'] = "Неправильный телефон";
        //     $error = true;
        // }

        if ($error) {
            return $error;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $id = User::create($email, $name, $telephone, $additional_telephone, $about, $activity_id, $organization);

        if (!$id) {
            return;
        }

        $session_token = md5(time());

        Authorization::create($login, $password, $session_token, $id);

        if (mb_substr($img['type'], 0, 6) === 'image/') {
            $img_name = time() . random_int(100, 900) . '.png';

            if (Certificate::create($img_name, $id)) {
                move_uploaded_file($img['tmp_name'], './source/upload/' . $img_name);
            }
        }

        $_SESSION['user']['id'] = $id;

        AuthorizationSession::create($_SERVER['REMOTE_HOST'], $_SERVER['HTTP_USER_AGENT'], $id);

        setcookie("session_token", $session_token, time()+ 60 * 60 * 24 * 30);
        
        if (!$messengers) {
            return;
        }

        foreach ($messengers as $messenger) {
            if ($messenger['telephone']) {
                UserMessenger::create($messenger['name'], $messenger['telephone'], $id);
            }
        }

        Router::location("profile?id=$id");
    }
}

if (isset($_POST['registration_button'])) {
    $email = $_REQUEST['user_email'];
    $telephone = $_REQUEST['user_telephone'];
    $login = $_REQUEST['user_login'];
    $name = $_REQUEST['user_name'];
    $password = $_REQUEST['user_password'];
    $password_confirm = $_REQUEST['user_password_confirm'];
    $about = $_REQUEST['user_about'];
    $organization = $_REQUEST['user_organization'];
    $telephone_second = $_REQUEST['user_telephone_second'];
    $activity = $_REQUEST['user_activity'];

    $viber = $_REQUEST['user_viber'];
    $whatsapp = $_REQUEST['user_whatsapp'];
    $telegram = $_REQUEST['user_telegram'];

    $certificate = $_FILES['user_certificate'];

    $messengers = [
        [
            "name" => "viber",
            "telephone" => protectionData($viber)
        ],
        [
            "name" => "whatsapp",
            "telephone" => protectionData($whatsapp)
        ],
        [
            "name" => "telegram",
            "telephone" => protectionData($telegram)
        ]
    ];

    UserController::create($login, $password, $email, $name, $telephone, $telephone_second, $about, $activity, $organization, $messengers, $certificate, $password_confirm);
}
?>