<?

class AuthorizationSession {
    static public function create($ip, $agent, $user_id) {
        global $mysqli;

        return $mysqli->query("INSERT INTO `authorization_session`(`ip`, `agent`, `user_id`) VALUES ('$ip', '$agent', '$user_id')");
    }
}

?>