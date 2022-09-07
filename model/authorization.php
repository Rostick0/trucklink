<?

class Authorization {
    public static function create($login, $password, $session_token, $user_id) {
        global $mysqli;

       return $mysqli->query("INSERT INTO `authorization` (`login`, `password`, `session_token`, `user_id`) VALUES ('$login', '$password', '$session_token', $user_id)");
    }

    public static function checkSession($user_id, $session_token) {
        global $mysqli;

        return $mysqli->query("SELECT * FROM `authorization` WHERE `user_id` = '$user_id' AND `session_token` = '$session_token'");
    }
}

?>