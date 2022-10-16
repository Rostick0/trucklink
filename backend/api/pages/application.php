<?

$user_id = (int) $_GET['user_id'];
$from = protectedData($_GET['from']);
$to = protectedData($_GET['to']);
$date = protectedData($_GET['date']);
$transport_type = protectedData($_GET['transport_type']);
$body_type = protectedData($_GET['body_type']);
$loading_method = protectedData($_GET['loading_method']);
$size = protectedData($_GET['size']);
$height = protectedData($_GET['height']);
$price_min = (float) $_GET['price_min'];
$price_max = (float) $_GET['price_max'];

$params = [
    'user_id' => $user_id,
    'from' => $from,
    'to' => $to,
    'date' => $date,
    'transport_type' => $transport_type,
    'body_type' => $body_type,
    'loading_method' => $loading_method,
    'size' => $size,
    'height' => $height,
];

$where_params = whereParams($params);

if ($price_max) {
    $where_params .= " AND `price` < '$price_max'";
}

if ($price_min) {
    $where_params .= " AND `price` > '$price_min'";
}

if ($limit) {
    $where_params .= "LIMIT $limit";

    if ($offset) {
        $where_params .= "OFFSET $offset";
    }
}

Application::get($where_params);

?>