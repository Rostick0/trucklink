<?

class User {
    public static function create($email, $telephone, $password, $name, $surname) {
        global $db;

        $query = $db->query("INSERT INTO `user` (`email`, `telephone`, `password`, `name`, `surname`) VALUES ('$email', '$telephone', '$password', '$name', '$surname')");

        if ($query) {
            return mysqli_insert_id($db);
        }
    }
}

?>