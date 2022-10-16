<?

function protectedData($string) {
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = addslashes($string);
    
    return $string;
}

function getDbDate($table, $column, $value, $limit = null, $offset = null) {
    global $db;

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

?>