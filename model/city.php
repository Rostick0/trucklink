<?

class City {
    static public function getWithCountry() {
        global $mysqli;
    
        $result = [];
    
        $cities = $mysqli->query("SELECT `city`.`city_id`, `country`.`name` as `country`, `city`.`name` as `city` FROM `country` JOIN `city` ON `country`.`country_id` = `city`.`country_id`");
        foreach($cities as $city) {
            $result[] = $city;
        }
    
        return $result;
    }

    static public function getWithCountryOne($id) {
        global $mysqli;

        $city = $mysqli->query("SELECT `city`.`city_id`, `country`.`name` as `country`, `city`.`name` as `city` FROM `country` JOIN `city` ON `country`.`country_id` = `city`.`country_id` WHERE `city`.`city_id` = '$id'");
        return $city->fetch_assoc();
    }
}

?>