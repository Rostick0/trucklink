<?

function whereParams($array_data) {
    if (empty($array_data)) return;

    $where_params = "WHERE ";

    foreach($array_data as $name => $data) {
        if ($data) {
            $where_params .= "`{$name}` = '{$data}' AND ";
        }
    }

    return mb_substr($where_params, 0, -5);
}

?>