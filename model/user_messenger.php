<?
class UserMessenger {
    static public function create($name, $telephone, $id) {
        global $mysqli;

        return $mysqli->query("INSERT INTO `user_messenger` (`name`, `telephone`, `user_id`) VALUES ('$name', '$telephone', $id)");
    }
}
?>