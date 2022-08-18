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

function normalizeDate($date, $haveYear = false) {
    global $month_short;

    $result = mb_substr($date, 5, 6);
    $result = mb_substr($result, -2) . ' ' . $month_short[mb_substr($result, 0, 2) - 1];
    
    if ($haveYear) {
        $result .= ' ' . mb_substr($date, 0, 4);
    }

    return $result;
}

function normalizeDateTime($date, $haveYear = false) {
    $time = mb_substr($date, -9);
    $date = mb_substr($date, 0, 10);

    $date = normalizeDate($date, $haveYear);
    $time = mb_substr($time, 0, 6);
    
    return $time . ' ' . $date;
}

function showFlag($country) {
    if ($country == 'Россия') {
        $flag = "flag_russia.png";
    }

    if ($country == 'Казахстан') {
        $flag = "flag_kazakhstan.png";
    }

    if ($country == 'Белорусия') {
        $flag = "flag_belarus.png";
    }

    if ($country == 'Украина') {
        $flag = "flag_ukraine.png";
    }

    if ($flag) {
        return '<img class="flag-img" src="./source/static/img/' . $flag . '" alt="' . $country . '"/>';
    }
}

?>