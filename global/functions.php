<?

function protectionData($string) {
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = addslashes($string);
    
    return $string;
}

function parseIntGet($value) {
    return (int) $_GET[$value] ? (int) $_GET[$value] : NULL;
}

function parseStrGet($value) {
    return $_GET[$value] ? protectionData($_GET[$value]) : NULL;
}

function normalizeDateSql($date) {
    global $month_short;

    $result = explode(" ", $date);
    $result = $result[2] . "-" . (array_search($result[1], $month_short) + 1) . "-" . $result[0];

    return $result;
}

?>