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

function parseDd($table, $column = null, $value = null, $name = 'name') {
    return getDbDate($table, $column, $value)->fetch_assoc()[$name];
}

function normalizeTepelhone($telephone) {
    return $telephone = mb_ereg_replace('[^0-9]', '', $telephone);
}

function whereParams($data, $data_more = null, $data_less = null, $date_like = null) {
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

    foreach($date_like as $name => $data) {
        if ($data) {
            $where_params .= "`{$name}` LIKE '%{$data}%' AND ";
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

function stringMaxAndPoint($string, $length) {
    if (mb_strlen($string) < $length) return $string;
    
    return mb_substr($string, 0, $length) . '...';
}

?>