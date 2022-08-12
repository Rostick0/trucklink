<?

class UserActivity {
    public static function getAll() {
        global $mysqli;

        $activities = $mysqli->query("SELECT * FROM `user_activity`");
        $result = [];

        foreach ($activities as $activity) {
            $result[] = $activity;
        }

        return $result;
    }
}

?>