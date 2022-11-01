<?

class Message {
    public static function create($text, $application_id, $user_from, $user_to) {
        global $db;

        return $db->query("INSERT INTO `message`(`text`, `application_id`, `user_from`, `user_to`) VALUES ('$text','$application_id','$user_from', '$user_to')");
    }
}

?>