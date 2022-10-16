<?

class User {
    public static function create($email, $telephone, $password, $name, $surname) {
        global $db;

        if (!$telephone) {
            $telephone = "NULL";
        }

        $query = $db->query("INSERT INTO `user` (`email`, `password`, `name`, `surname`) VALUES ('$email', $telephone,'$password', '$name', '$surname')");
    
        if ($query) {
            return mysqli_insert_id($db);
        }
    }
}

?>