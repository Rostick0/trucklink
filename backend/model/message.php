<?

class Message {
    public static function create($text, $application_id, $user_id) {
        global $db;

        return $db->query("INSERT INTO `message`(`text`, `application_id`, `user_id`) VALUES ('$text','$application_id','$user_id')");
    }
}

?>