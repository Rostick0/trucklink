<?

class Chat {
    static public function getUsers($user_id, $limit, $offset) {
        global $mysqli;

        $limit_and_offset = "LIMIT $limit";

        if ($limit && $offset) {
            $limit_and_offset = "LIMIT $limit OFFSET $offset";
        }

        return $mysqli->query("SELECT DISTINCT `user_id` FROM (SELECT `date_created`, `user_from` as 'user_id' FROM `message` WHERE `user_to` = '$user_id' UNION SELECT `date_created`, `user_to` FROM `message` WHERE `user_from` = '$user_id' ORDER BY `date_created` DESC) `a` $limit_and_offset");
    }
}

?>