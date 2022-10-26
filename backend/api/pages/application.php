<?

$application_id = (int) $_GET['application_id'];
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

switch ($http_method) {
    case 'GET':
        $params = [
            'application_id' => $application_id,
            'user_id' => $user_id,
            'from' => $from,
            'to' => $to,
            'date' => $date,
            'transport_type' => $transport_type,
            'body_type' => $body_type,
            'loading_method' => $loading_method,
            'size' => $size,
            'height' => $height,
            'is_deleted' => 0
        ];
        
        $params_more = [
            'price' => $price_max
        ];
        
        $params_less = [
            'price' => $price_min
        ];
        
        $where_params = whereParams($params, $params_more, $params_less);
        
        if ($limit) {
            $where_params .= "LIMIT $limit";
        
            if ($offset) {
                $where_params .= "OFFSET $offset";
            }
        }
        
        $applications = Application::get($where_params);
        
        if (!$applications) {
            die(messageError('Нет заявок', 404));
        }
        
        $data = [];
        
        while ($application = $applications->fetch_assoc()) {
            $data[] = $application;
        }
        
        if (!empty($data)) {
            echo json_encode($data);
        } else {
            die(messageError('Нет заявок', 404));
        }
        break;
    case 'DELETE':
        ApplicationController::httpDelete($application_id, $_SESSION['user']['user_id']);
        break;
}

?>