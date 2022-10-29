<?

class NormalizeView {
    public static function price($price) {
        $price = strrev($price);

        $result = "";

        for ($i = 0; $i < strlen($price); $i++) {
            if ($i%3 == 0) {
                $result .= " ";
            }

            $result .= $price[$i];
        }
        
        return strrev($result);
    }

    public static function checkPrice($price, $money_icon = "$") {
        if ($price) {
            return $money_icon . NormalizeView::price($price);
        }

        return 'Запрос цены';
    }

    public static function date($date) {
        global $MONTHS;

        $date = substr($date, 5);

        $day = substr($date, -2);
        $month = (int) substr($date, 0, 2);
        $month = $MONTHS[$month - 1];
        $month = mb_substr($month, 0, 3);

        return "$day $month";
    }
}

?>