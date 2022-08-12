<?

class Certificate {
    public static function create($path, $user_id) {
        global $mysqli;

        return $mysqli->query("INSERT INTO `certificate` (`path`, `user_id`) VALUES ('$path', '$user_id')");
    }
}

?>