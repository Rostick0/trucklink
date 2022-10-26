<?

class UserController
{
    public static function registration($email, $telephone, $password, $name, $surname)
    {
        $email = protectedData($email);
        $telephone = (int) $telephone;
        $password = protectedData($password);
        $name = protectedData($name);
        $surname = protectedData($surname);

        $errors = [];

        if (mb_strlen($email) < 5) {
            $errors['email'] = "Пароль меньше 5 символов";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Неправильная почта";
        }

        if (getDbDate('user', 'email', $email)->num_rows > 0) {
            $errors['email'] = "Данный аккаунт уже существует";
        }

        if (mb_strlen($telephone) < 8) {
            $errors['telephone'] = "Телефон меньше 8 символов";
        }

        if (mb_strlen($password) < 8) {
            $errors['password'] = "Пароль меньше 8 символов";
        }

        if (!$name) {
            $errors['name'] = "Отсуствует имя";
        }

        if (!$surname) {
            $errors['surname'] = "Отсуствует фамилия";
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'data' => $errors
            ];
        }

        Email::codeRegistration($email);

        $password = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['user_registration'] = [
            'email' => $email,
            'telephone' => $telephone,
            'password' => $password,
            'name' => $name,
            'surname' => $surname
        ];

        header('Location: /registration?type=confirm');
    }

    public static function confirmCreate($email_code) {
        if (
            $email_code != $_SESSION['email_code']
            ||
            !$_SESSION['email_code']) {
            return [
                'type' => 'error',
                'data' => [
                    'email' => 'Неправильный код из почты'
                ]
            ];
        }

        return UserController::create();
    }

    public static function create() {
        $user_data = $_SESSION['user_registration'];

        if (empty($user_data)) {
            return [
                'type' => 'error',
                'data' => [
                    'error' => 'Отсуствуют данные'
                ]
            ];
        }

        $email = $user_data['email'];
        $telephone = $user_data['telephone'];
        $password = $user_data['password'];
        $name = $user_data['name'];
        $surname = $user_data['surname'];

        $user_id = User::create($email, $telephone, $password, $name, $surname);

        if ($user_id) {
            $token = md5(random_int(1000, 9999) . time());

            $_SESSION['user_registration'] = null;

            UserSession::create($token, $user_id);

            setcookie('session_token', $token, time() + 60*60*24*30, '/');

            header("Location: /profile?id={$user_id}");
        }
    }

    public static function log($email, $password) {
        $email = protectedData($email);
        $password = protectedData($password);

        $user = getDbDate('user', 'email', $email)->fetch_assoc();
        $password_hash = null;

        $errors = [];

        if (!$user) {
            $errors['email'] = 'Данного пользователя не существует';
        } else {
            $password_hash = $user['password'];

            if (!password_verify($password, $password_hash)) {
                $errors['password'] = "Неправильный пароль";
            }
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'data' => $errors
            ];
        }

        $token = getDbDate('user_session', 'user_id', $user['user_id'])->fetch_assoc();
        $token = $token['token'];

        setcookie('session_token', $token, time() + 60*60*24*30, '/');
        $_SESSION['user'] = $user;
        header("Location: /profile?id={$user['user_id']}");
    }

    public static function updateAvatar($user_id, $avatar) {
        global $PATH_UPLOAD;

        if (!$user_id) die(messageError('Нет авторизации', 401));

        if (!$avatar['tmp_name']) die(messageError('Не загружается фотография', 400));

        $avatar_type = ImageController::getTypeImg($avatar['type']);

        if (ImageController::checkTypePhoto($avatar_type)) die(messageError('Тип фотографии не поддерживается', 400));

        $user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

        if (!$user) die(messageError('Пользователя не существует', 404));

        $avatar = ImageController::updatePhoto($avatar, $user['avatar']);

        $query = User::updateAvatar($user_id, $avatar);

        if ($query) {
            $user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();
            $avatar_new = $user['avatar'];
            
            echo json_encode([
                'avatar' => $PATH_UPLOAD . $avatar_new
            ]);
        }
    }
}

?>