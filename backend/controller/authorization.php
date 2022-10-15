<?

class AuthorizationController {
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


    }
}

?>