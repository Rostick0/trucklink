<?

class Application {
    public static function create($from, $to, $date, $transport_type, $user_fullname, $user_telephone, $user_email, $user_id, $loading_method,  $size, $height, $photo, $mass, $price, $comment) {
        global $db;
        
        $user_id = !empty($user_id) ? "'$user_id'" : "NULL";
        $loading_method = !empty($loading_method) ? "'$loading_method'" : "NULL";
        $size = !empty($size) ? "'$size'" : "NULL";
        $height = !empty($height) ? "'$height'" : "NULL";
        $photo = !empty($photo) ? "'$photo'" : "NULL";
        $mass = !empty($mass) ? "'$mass'" : "NULL";
        $price = !empty($price) ? "'$price'" : "NULL";
        $comment = !empty($comment) ? "'$comment'" : "NULL";

        return $db->query("INSERT INTO `application`(`from`, `to`, `date`, `transport_type`, `user_fullname`, `user_telephone`, `user_email`, `user_id`, `loading_method`, `size`, `height`, `photo`, `mass`, `price`,`comment`)
                            VALUES 
                        ('$from','$to','$date','$transport_type','$user_fullname','$user_telephone','$user_email',$user_id,$loading_method ,$size,$height,$photo,$mass,$price,$comment)");
    }

    public static function get($where_params) {
        global $db;

        return $db->query("SELECT * FROM `application` $where_params");
    }

    public static function delete($application_id, $user_id) {
        global $db;

        return $db->query("DELETE FROM `application` WHERE `application_id` = '$application_id' AND `user_id` = '$user_id'");
    }
}

?>