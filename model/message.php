<?

class Message {
    static public function get($user_from, $user_to, $limit, $offset) {
        global $mysqli;

        if ($limit && $offset) {
            $limitAndOffset = "LIMIT $limit OFFSET $offset";
        } else {
            $limitAndOffset = "LIMIT 15";
        }

        return $mysqli->query("SELECT * FROM `message` WHERE `user_from` = '$user_from' AND `user_to` = '$user_to' UNION SELECT * FROM `message` WHERE `user_from` = '$user_to' AND `user_to` = '$user_from' ORDER BY `message_id` DESC $limitAndOffset");
    }

    static public function lastMessage($user_first, $user_second) {
        global $mysqli;

        return $mysqli->query("SELECT * FROM (SELECT * FROM `message` WHERE `user_to` = '$user_first' AND `user_from` = '$user_second' UNION SELECT * FROM `message` WHERE `user_to` = '$user_second' AND `user_from` = '$user_first') `message` ORDER BY `message`.`date_created` DESC LIMIT 1")->fetch_assoc();
    }

    static public function create($text, $user_from, $user_to) {
        global $mysqli;

        $message = $mysqli->query("INSERT INTO `message` (`text`, `user_from`, `user_to`) VALUES ('$text', '$user_from', '$user_to')");

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