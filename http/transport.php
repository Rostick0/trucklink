<?

$offset = parseIntGet('offset');
$limit = parseIntGet('limit');
$from = parseIntGet('from');
$to = parseIntGet('to');
$transport_upload = parseIntGet('transport_upload');
$date_start = parseStrGet('date_start');
$date_end = parseStrGet('date_end');
$price_min = parseIntGet('price_min');
$price_max = parseIntGet('price_max');
$volume_min = parseIntGet('volume_min');
$volume_max = parseIntGet('volume_max');
$mass_min = parseIntGet('mass_min');
$mass_max = parseIntGet('mass_max');

if ($from) {
    $from = "AND `from` = '$from'";
}

if ($to) {
    $to = "AND `to` = '$to'";
}

if ($transport_upload) {
    $transport_upload = "AND `transport_upload`.`transport_upload_id` = '$transport_upload'";
}

if ($date_start) {
    $date_start = "AND `date_start` = '$date_start'";
}

if ($date_end) {
    $date_end = "AND `date_end` = '$date_end'";
}

if ($price_min) {
    $price_min = "AND `application`.`price` >= '$price_min'";
}

if ($price_max) {
    $price_max = "AND `application`.`price` <= '$price_max'";
}

if ($volume_min) {
    $volume_min = "AND `application_info`.`volume` >= '$volume_min'";
}

if ($volume_max) {
    $volume_max = "AND `application_info`.`volume` <= '$volume_max'";
}

if ($mass_min) {
    $mass_min = "AND `application_info`.`mass` >= '$mass_min'";
}

if ($mass_max) {
    $mass_max = "AND `application_info`.`mass` <= '$mass_max'";
}

$where_params = "$from $to $date_start $date_end $transport_upload $price_min $price_max $volume_min $volume_max $mass_min $mass_max";

$transports = Application::getHttp(2, $offset, $limit, $where_params);
$result = [];

foreach ($transports as $transport) {
    $transport['from'] = City::getWithCountryOne($transport['from']);
    $transport['to'] = City::getWithCountryOne($transport['to']);
    $result[] = $transport;
}

echo json_encode($result);

?>