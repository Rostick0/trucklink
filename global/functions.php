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

    if (!$date) {
        return;
    }

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

function hideTelephone($telephone) {
    $telephone_begin = mb_substr($telephone, 0, 4);
    $telephone_end = mb_substr($telephone, 4);
    $telephone_end = preg_replace('/\d/', 'X', $telephone_end);

    return $telephone_begin . $telephone_end;
}

function renderInput($error, $id = null, $name, $placeholder = null, $class = null, $type = "text", $isReadonly = false, $value = null, $title = null) {
    $isReadonly = $isReadonly ? 'readonly' : null;

    if ($id) {
        $id = 'id="' . $id . '"';
    }

    if ($name) {
        $name = 'name="' . $name .'"';
    }

    if ($title) {
        $title = 'title="' . $title . '"';
    }

    if ($error) {
        echo '<div class="error-input__form">
                <input class="input ' . $class . ' error-input" type="' . $type . '" placeholder="' . $placeholder . '" ' . $id . ' ' . $name . ' value="' . $value . '" ' . $title . ' ' . $isReadonly . '>
                <div class="error-input__text error">' .$error . '</div>
            </div>';


       return null;
    }

    echo '<input class="input ' . $class . '" type="' . $type . '" placeholder="' . $placeholder . '" ' . $id . ' ' . $name . ' value="' . $value . '" ' . $isReadonly . '>';
}

function SpacesMumbers($price, $lengthBetweenSpaces = 3) {
    $price = (int) $price;
    
    $result = '';

    $price = '0' . strrev((string) $price);

    for ($i = 1; $i < strlen($price); $i++) {
        $result .= $price[$i];

        if ($i === 0) {
            continue;
        }

        if ($i % $lengthBetweenSpaces === 0) {
            $result .= ' ';
        }
    }

    $result = strrev($result);
    $result = trim($result);

    return $result;
}

function renderAvatar($classFirst = null, $classSecound = null, $avatar = null, $name = null) {
    if ($avatar && file_exists("./source/upload/" . $avatar)) {
        return '<img class="avatar__img ' . $classFirst . '" src="./source/upload/' . $avatar . '" alt="' . $name . '">';
    }

    return '<div class="avatar__icon ' . $classSecound . '">' . mb_substr($name, 0, 1) . '</div>';
}

?>