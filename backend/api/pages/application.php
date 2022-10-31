<?

$application_id = (int) $_GET['application_id'];
$user_id = (int) $_GET['user_id'];
$from = protectedData($_GET['from']);
$to = protectedData($_GET['to']);
$date = protectedData($_GET['date']);
$status = (int) $_GET['status'];
$transport_type = (int) $_GET['transport_type'];
$loading_method = (int) $_GET['loading_method'];
$size = (int) $_GET['size'];
$height = (int) $_GET['height'];
$price_min = (float) $_GET['price_min'];
$price_max = (float) $_GET['price_max'];

switch ($http_method) {
    case 'GET':
        $params = [
            'application_id' => $application_id,
            'user_id' => $user_id,
            'date' => $date,
            'status' => $status,
            'transport_type' => $transport_type,
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

        $params_like = [
            'from' => $from,
            'to' => $to,
        ];
        
        $where_params = whereParams($params, $params_more, $params_less, $params_like);
        
        if ($limit) {
            $where_params .= "LIMIT $limit";
        
            if ($offset) {
                $where_params .= " OFFSET $offset";
            }
        }
        
        $applications = Application::get($where_params);
        
        if (!$applications) {
            die(messageError('Нет заявок', 404));
        }
        
        $data = [];
        
        while ($application = $applications->fetch_assoc()) {
            $application['from'] = $application['from'];
            $application['to'] = $application['to'];
            $application['date'] = DateView::normalizeDate($application['date']);
            $application['transport_type'] = parseDd('transport_type', 'transport_type_id', $application['transport_type']);
            $application['status'] = parseDd('status', 'status_id', $application['status']);
            $application['loading_method'] = parseDd('loading_method', 'loading_method_id', $application['loading_method']);
            $application['size'] = parseDd('size', 'size_id', $application['size']);
            $application['height'] = parseDd('height', 'height_id', $application['height']);
            $application['price'] = NormalizeView::checkPrice($application['price']);
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