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

    public static function edit($from, $to, $date, $transport_type, $loading_method, $size, $height, $photo, $mass, $price, $comment, $application_id, $user_id) {
        global $db;

        $loading_method = !empty($loading_method) ? "'$loading_method'" : "NULL";
        $size = !empty($size) ? "'$size'" : "NULL";
        $height = !empty($height) ? "'$height'" : "NULL";
        $photo = !empty($photo) ? "'$photo'" : "NULL";
        $mass = !empty($mass) ? "'$mass'" : "NULL";
        $price = !empty($price) ? "'$price'" : "NULL";
        $comment = !empty($comment) ? "'$comment'" : "NULL";
        
        return $db->query("UPDATE `application` SET `from`='$from',`to`='$to',`date`='$date',`date_edited`=CURRENT_TIMESTAMP,`transport_type`='$transport_type',`loading_method`=$loading_method,`size`=$size,`height`=$height,`photo`=$photo,`mass`=$mass,`price`=$price,`comment`=$comment WHERE `application_id` = '$application_id' AND `user_id` = '$user_id'");
    }

    public static function delete($application_id, $user_id) {
        global $db;

        $user_transport_type_id = getDbDate('user', 'user_id', $user_id)->fetch_assoc()['user_type_id'];
        $user_power = getDbDate('user_type', 'user_type_id', $user_transport_type_id)->fetch_assoc()['power'];

        if ($user_power >= 10) {
            return $db->query("DELETE FROM `application` WHERE `application_id` = '$application_id'");
        }

        return $db->query("DELETE FROM `application` WHERE `application_id` = '$application_id' AND `user_id` = '$user_id'");
    }
}

?>