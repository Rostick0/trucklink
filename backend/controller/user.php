<?

class UserController
{
    public static function registration($email, $password, $name, $surname)
    {
        $email = protectedData($email);
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

        $_SESSION['user_registration'] = [
            'email' => $email,
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
    }

    public static function create() {
        $user_data = $_SESSION['user_registration'];

        if (!empty($user_data)) {
            return [
                'type' => 'error',
                'data' => [
                    'error' => 'Отсуствуют данные'
                ]
            ];
        }

        $email = $user_data['email'];
        $password = $user_data['password'];
        $name = $user_data['name'];
        $surname = $user_data['surname'];

        if (User::create($email, $password, $name, $surname)) {
            $_SESSION['user_registration'] = null;
        }
    }
}

?>