<?

class Model {
    static public function count($table, $column = null, $value = null) {
        global $mysqli;

        if ($column && $value) {
            $count = $mysqli->query("SELECT COUNT(*) FROM `$table` WHERE `$column` = '$value'");
        } else {
            $count = $mysqli->query("SELECT COUNT(*) FROM `$table`");
        }

        $count = $count->fetch_assoc();
        return $count["COUNT(*)"];
    }

    static public function countWhere($table, $where_param) {
        global $mysqli;

        var_dump($where_param);

        $count = $mysqli->query("SELECT COUNT(*) FROM `$table` $where_param");

        $count = $count->fetch_assoc();
        return $count["COUNT(*)"];
    }

    static public function get($table, $column = null, $value = null, $limit = null) {
        global $mysqli;

        if ($limit) {
            $limit = "LIMIT $limit";
        }

        if ($column && $value) {
            $count = $mysqli->query("SELECT * FROM `$table` WHERE `$column` = '$value' $limit");
        } else {
            $count = $mysqli->query("SELECT * FROM `$table` $limit");
        }

        $count = $count->fetch_assoc();

        return $count;
    }

    static public function getAll($table, $column = null, $value = null) {
        global $mysqli;

        if ($column && $value) {
            $count = $mysqli->query("SELECT * FROM `$table` WHERE `$column` = '$value'");
        } else {
            $count = $mysqli->query("SELECT * FROM `$table`");
        }

        return $count;
    }
}

?>