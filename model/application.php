<?

class Application {
    static public function getCargo($application_id = 0, $limit = 10) {
        global $mysqli;

        return $mysqli->query("SELECT * FROM `application` JOIN `application_info` ON `application`.`application_id` = `application_info`.`application_info_id` WHERE `application`.`application_id` > $application_id LIMIT $limit");
    }

    static public function getCargoOne($application_id) {
        global $mysqli;

        $cargo = $mysqli->query("SELECT * FROM `application` JOIN `application_info` ON `application`.`application_id` = `application_info`.`application_info_id` WHERE `application`.`application_id` = $application_id");
        return $cargo->fetch_assoc();
    }

    static public function getHttp($type = 1, $offset = null, $limit = null, $where_params = null) {
        // 1 - cargo, 2 - transport
        global $mysqli;

        if ($limit) {
            $limit = "LIMIT $limit";
        }

        if ($offset) {
            $offset = "AND `application_id` > '$offset'";
        }
    
        $cargo = $mysqli->query("SELECT 
        `application`.`application_id`, `application`.`date_start`, `application`.`date_end`, `application`.`from`, `application`.`to`, `transport_upload`.`name` as `transport` 
        FROM `application`, `transport_upload`,`application_info`
        WHERE `application`.`transport_upload_id` = `transport_upload`.`transport_upload_id` AND `application_info`.`application_id` = `application`.`application_id`
        AND `application_type_id` = '$type' $offset $where_params ORDER BY `application`.`application_id` DESC $limit");
        return $cargo;
    }

    static public function create($price, $from, $to, $transport_upload_id, $upload_type_id, $application_type_id, $is_any_direction, $date_start, $date_end, $user_id, $volume, $weight, $length, $width, $height, $description) {
        global $mysqli;

        $query = $mysqli->query("INSERT INTO `application`(`price`, `from`, `to`,`transport_upload_id`, `upload_type_id`,`application_type_id`, `is_any_direction`, `date_start`, `date_end`, `user_id`) VALUES ('$price','$from','$to','$transport_upload_id','$upload_type_id','$application_type_id','$is_any_direction','$date_start','$date_end', '$user_id')");

        if ($query) {
            $id = mysqli_insert_id($mysqli);
            $mysqli->query("INSERT INTO `application_info` (`volume`, `weight`, `length`, `width`, `height`, `description`, `application_id`) VALUES ('$volume', '$weight', '$length', '$width', '$height', '$description', '$id')");
        } else {
            var_dump($mysqli->error);
        }
    }
}

?>