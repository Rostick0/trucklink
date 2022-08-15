<?

class Authorization {
    public static function create($login, $password, $session_token, $user_id) {
        global $mysqli;

       return $mysqli->query("INSERT INTO `authorization` (`login`, `password`, `session_token`, `user_id`) VALUES ('$login', '$password', '$session_token', $user_id)");
    }
}

?>