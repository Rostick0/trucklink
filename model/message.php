<?

class Message {
    static public function create($text, $user_from, $user_to) {
        global $mysqli;

        $message = $mysqli->query("INSERT INTO `message` (`text`, `user_from`, `user_to`) VALUES ('$text', '$user_from', '$user_to',)");

        if (!$message) {
            return;
        }

        return mysqli_insert_id($mysqli);
    }

    static public function edit($message_id, $text, $user_from) {
        global $mysqli;

        return $mysqli->query("UPDATE `message` SET `text` = '$text', `date_edited` = CURRENT_TIMESTAMP WHERE `message_id` = '$message_id' AND `user_from` = '$user_from'");
    }

    static public function hide($user_from, $message_id) {
        global $mysqli;

        return $mysqli->query("UPDATE `message` SET `is_hide` = '1' WHERE `message_id` = '$message_id' AND `user_from` = '$user_from'");
    }
}

?>