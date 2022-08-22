<?

class User {
    public static function getAll($limit = null, $offset = null) {
        global $mysqli;

        if ($limit) {
            $limit = " LIMIT $limit";
        }

        if ($offset) {
            $offset = "WHERE `user_id` >= '$offset'";
        }

        $users = $mysqli->query("SELECT * FROM `user` $offset $limit");
        $result = [];

        foreach ($users as $user) {
            $result[] = $user;
        }

        return $result;
    }

    public static function create($email, $name, $telephone, $additional_telephone, $about, $activity_id, $organization) {
        global $mysqli;
        $query = $mysqli->query("INSERT INTO `user` (`email`, `name`, `telephone`, `additional_telephone`, `about`, `activity_id`, `organization`) VALUES ('$email', '$name', '$telephone', '$additional_telephone', '$about', '$activity_id', '$organization')");

        if ($query) {
            return mysqli_insert_id($mysqli);
        }

        return $mysqli->error;
    }
    
    public static function setAvatar($user_id, $avatar) {
        global $mysqli;

        return $mysqli->query("UPDATE `user` SET `avatar`='$avatar' WHERE `user_id` = '$user_id'");
    }
    //public static function delete();
}

?>