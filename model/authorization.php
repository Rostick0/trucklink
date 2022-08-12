<?

class Authorization {
    public static function create($login, $password, $session_token) {
        global $mysqli;

       return $mysqli->query("INSERT INTO `authorization` (`login`, `password`, `session_token`) VALUES ('$login', '$password', '$session_token')");
    }
}

?>