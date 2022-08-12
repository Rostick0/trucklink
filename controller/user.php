<?

class UserController {
    public static function create($login, $password, $email, $name, $telephone, $additional_telephone, $about, $activity_id, $organization, $messengers, $img) {
        $login = protectionData($login);
        $password = protectionData($password);
        $email = protectionData($email);
        $name = protectionData($name);
        $telephone = protectionData($telephone);
        $additional_telephone = protectionData($additional_telephone);
        $about = protectionData($about);
        $activity_id = protectionData($activity_id);
        $organization = protectionData($organization);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $errors = [];

        if (strlen($login) < 3) {
            $errors[] = [
                'type' => 'login',
                'error' => 'Логин меньше 3 символов'
            ];
        }

        if (strlen($password) < 5) {
            $errors[] = [
                'type' => 'login',
                'error' => 'Пароль меньше 5 символов'
            ];
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = [
                'type' => 'login',
                'error' => 'Пароль меньше 5 символов'
            ];
        }

        // if (!empty($errors)) {
        //     return $errors;
        // }

        $id = User::create($email, $name, $telephone, $additional_telephone, $about, $activity_id, $organization);

        $session_token = md5(time());

        Authorization::create($login, $password, $session_token, $id);

        if (mb_substr($img['type'], 0, 6) === 'image/') {
            $img_name = time() . random_int(100, 900) . '.png';

            if (Certificate::create($img_name, $id)) {
                move_uploaded_file($img['tmp_name'], './source/upload/' . $img_name);
            }
        }

        $_SESSION['user']['id'] = $id;

        setcookie("session_token", $session_token, time()+ 60 * 60 * 24 * 30);
        
        if (!$messengers) {
            return;
        }

        foreach ($messengers as $messenger) {
            UserMessenger::create($messenger['name'], $messenger['telephone'], $id);
        }
    }
}

if (isset($_POST['registration_button'])) {
    $email = $_REQUEST['user_email'];
    $telephone = $_REQUEST['user_telephone'];
    $login = $_REQUEST['user_login'];
    $name = $_REQUEST['user_name'];
    $password = $_REQUEST['user_password'];
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
            "telephone" => $viber
        ],
        [
            "name" => "whatsapp",
            "telephone" => $whatsapp
        ],
        [
            "name" => "telegram",
            "telephone" => $telegram
        ]
    ];

    UserController::create($login, $password, $email, $name, $telephone, $telephone_second, $about, $activity, $organization, $messengers, $certificate);
}
?>