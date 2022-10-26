<?

$month_short = [
    'янв',
    'фев',
    'мар',
    'апр',
    'май',
    'июн',
    'июл',
    'авг',
    'сен',
    'окт',
    'ноя',
    'дек'
];

class DateView
{
    public static function normalizeDate($date, $haveYear = false)
    {
        global $month_short;

        $result = mb_substr($date, 5, 6);
        $result = mb_substr($result, -2) . ' ' . $month_short[mb_substr($result, 0, 2) - 1];

        if ($haveYear) {
            $result .= ' ' . mb_substr($date, 0, 4);
        }

        return $result;
    }

    public static function normalizeDateSql($date)
    {
        global $month_short;

        $result = explode(' ', $date);

        $year = $result[2];
        $month = (int) array_search($result[1], $month_short) + 1;
        $day = $result[0];

        $result = "{$year}-{$month}-{$day}";

        return $result;
    }
}

?>