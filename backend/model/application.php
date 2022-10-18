<?

class Application {
    public static function create($from, $to, $date, $type_transport, $user_fullname, $user_telephone, $user_email, $user_id, $body_type, $loading_method,  $size, $height, $mass, $price) {
        global $db;
        
        $user_id = !empty($user_id) ? "'$user_id'" : "NULL";
        $body_type = !empty($body_type) ? "'$body_type'" : "NULL";
        $loading_method = !empty($loading_method) ? "'$loading_method'" : "NULL";
        $size = !empty($size) ? "'$size'" : "NULL";
        $height = !empty($height) ? "'$height'" : "NULL";
        $mass = !empty($mass) ? "'$mass'" : "NULL";
        $price = !empty($price) ? "'$price'" : "NULL";

        return $db->query("INSERT INTO `application`(`from`, `to`, `date`, `transport_type`, `user_fullname`, `user_telephone`, `user_email`, `user_id`, `body_type`, `loading_method`, `size`, `height`, `mass`, `price`)
                            VALUES 
                        ('$from','$to','$date','$type_transport','$user_fullname','$user_telephone','$user_email',$user_id,$body_type,$loading_method ,$size,$height,$mass,$price)");
    }

    public static function get($where_params) {
        global $db;

        return $db->query("SELECT * FROM `application` $where_params");
    }
}

?>