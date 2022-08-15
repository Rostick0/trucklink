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

    static public function get($table, $column = null, $value = null, $limit = null) {
        global $mysqli;

        if ($limit) {
            $limit = "LIMIT $limit";
        }

        if ($column && $value) {
            $count = $mysqli->query("SELECT * FROM `$table` WHERE `$column` = '$value' $limit");
            $count = $count->fetch_assoc();
        } else {
            $count = $mysqli->query("SELECT * FROM `$table` $limit");
        }

        return $count;
    }

    static public function getAll($table, $column, $value) {
        global $mysqli;

        $count = $mysqli->query("SELECT * FROM `$table` WHERE `$column` = '$value'");
        return $count;
    }
}

?>