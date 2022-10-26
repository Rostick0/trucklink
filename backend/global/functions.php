<?

function protectedData($string) {
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = addslashes($string);
    
    return $string;
}

function getDbDate($table, $column = null, $value = null, $limit = null, $offset = null) {
    global $db;

    if (!$value && !$column) {
        return $db->query("SELECT * FROM `$table`");
    }

    $limitAndOffset = null;

    if ($limit) {
        $limitAndOffset = "LIMIT $limit";

        if ($offset) {
            $limitAndOffset .= " OFFSET $offset";
        }
    }

    return $db->query("SELECT * FROM `$table` WHERE `$column` = '$value' $limitAndOffset");
}

function normalizeTepelhone($telephone) {
    return $telephone = mb_ereg_replace('[^0-9]', '', $telephone);
}

// дд.мм.год
// function normalizeDate($date) {

// }

function whereParams($data, $data_more = null, $data_less = null) {
    if (empty($data) && empty($data_more) && empty($data_less)) return;

    $where_params = "";

    foreach($data as $name => $data) {
        if ($data) {
            $where_params .= "`{$name}` = '{$data}' AND ";
        }
    }

    foreach($data_more as $name => $data) {
        if ($data) {
            $where_params .= "`{$name}` < '{$data}' AND ";
        }
    }

    foreach($data_less as $name => $data) {
        if ($data) {
            $where_params .= "`{$name}` > '{$data}' AND ";
        }
    }

    if (!$where_params) return;

    $where_params = "WHERE " . $where_params;

    return mb_substr($where_params, 0, -5);
}

function searchKeyArray($id, $array, $elem) {
    foreach ($array as $key => $val) {
        if ($val[$elem] == $id) {
            return $key;
            break;
        }
    }
    return null;
}

?>