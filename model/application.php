<?

class Application {
    static public function getCargo($application_id = 0, $limit = 10) {
        global $mysqli;

        return $mysqli->query("SELECT * FROM `application` JOIN `application_info` ON `application`.`application_id` = `application_info`.`application_info_id` WHERE `application`.`application_id` > $application_id LIMIT $limit");
    }

    static public function getApplicationOne($application_id) {
        global $mysqli;

        $cargo = $mysqli->query("SELECT * FROM `application` JOIN `application_info` ON `application`.`application_id` = `application_info`.`application_info_id` WHERE `application`.`application_id` = $application_id");
        return $cargo->fetch_assoc();
    }

    static public function getHttp($type = 1, $where_params = null) {
        // 1 - cargo, 2 - transport
        global $mysqli;

        $query = $mysqli->query("SELECT 
        `application`.`application_id`, `application`.`price`, `application`.`date_created`, `application`.`date_start`, `application`.`date_end`, `application`.`from`, `application`.`to`, `transport_upload`.`name` as `transport`, `upload_type`.`name` as `upload_type`
        FROM `application`, `transport_upload`,`application_info`,`upload_type`
        WHERE `application`.`transport_upload_id` = `transport_upload`.`transport_upload_id`
        AND `application_info`.`application_id` = `application`.`application_id`
        AND `upload_type`.`upload_type_id` = `application`.`upload_type_id`
        AND `application_type_id` = '$type' $where_params
        ");
        return $query;
    }

    static public function create($price, $from, $to, $transport_upload_id, $upload_type_id, $application_type_id, $is_any_direction, $date_start, $date_end, $user_id, $volume, $weight, $length, $width, $height, $description, $type) {
        global $mysqli;

        if ($price) {
            $query = $mysqli->query("INSERT INTO `application`(`price`, `from`, `to`,`transport_upload_id`, `upload_type_id`,`application_type_id`, `is_any_direction`, `date_start`, `date_end`, `user_id`) VALUES ('$price','$from','$to','$transport_upload_id','$upload_type_id','$application_type_id','$is_any_direction','$date_start','$date_end', '$user_id')");
        } else {
            $query = $mysqli->query("INSERT INTO `application`(`price`, `from`, `to`,`transport_upload_id`, `upload_type_id`,`application_type_id`, `is_any_direction`, `date_start`, `date_end`, `user_id`) VALUES (NULL,'$from','$to','$transport_upload_id','$upload_type_id','$application_type_id','$is_any_direction','$date_start','$date_end', '$user_id')");
        }

        if ($query) {
            $id = mysqli_insert_id($mysqli);
            $mysqli->query("INSERT INTO `application_info` (`volume`, `weight`, `length`, `width`, `height`, `description`, `type`, `application_id`) VALUES ('$volume', '$weight', '$length', '$width', '$height', '$description', '$type', '$id')");
        } else {
            var_dump($mysqli->error);
        }
    }

    static public function edit($price, $from, $to, $date_start, $date_end, $transport_upload_id, $upload_type_id, $volume, $weight, $length, $width, $height, $description, $type, $user_id, $application_id) {
        global $mysqli;

        if ($price) {
            $query = $mysqli->query("UPDATE `application` SET `price`='$price', `from`='$from', `to`='$to', `transport_upload_id`='$transport_upload_id',`upload_type_id`='$upload_type_id', `date_start`='$date_start', `date_end`='$date_end' WHERE `application_id` = '$application_id' AND `user_id` = '$user_id'");
        } else {
            $query = $mysqli->query("UPDATE `application` SET `from`='$from', `to`='$to', `transport_upload_id`='$transport_upload_id',`upload_type_id`='$upload_type_id', `date_start`='$date_start', `date_end`='$date_end' WHERE `application_id` = '$application_id' AND `user_id` = '$user_id'");
        }


        if ($query) {
            return $mysqli->query("UPDATE `application_info` SET `volume`='$volume', `weight`='$weight', `length`='$length', `width`='$width',`height`='$height', `description`='$description', `type`='$type' WHERE `application_id` = '$application_id'");
        }
    }

    static public function count($application_type_id, $user_id = null) {
        global $mysqli;

        if ($user_id) {
            $user_id = " AND `user_id` = '$user_id'";
        } else {
            $user_id = "";
        }

        $count = $mysqli->query("SELECT COUNT(*) FROM `application` WHERE `application_type_id` = '$application_type_id' $user_id");

        $count = $count->fetch_assoc();
        return $count["COUNT(*)"];
    }
}

?>