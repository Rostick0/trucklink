<?

class User {
    public static function create($email, $password, $name, $surname) {
        global $db;

        return $db->query("INSERT INTO `user` (`email`, `password`, `name`, `surname`) VALUES ('$email', '$password', '$name', '$surname')");
    }
}

?>