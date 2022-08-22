<?

$where_params = ApplicationSearchController::getVars();

$transports = Application::getHttp(2, $where_params);
$result = [];

foreach ($transports as $transport) {
    $transport['from'] = City::getWithCountryOne($transport['from']);
    $transport['to'] = City::getWithCountryOne($transport['to']);
    $result[] = $transport;
}

if (empty($result)) {
    http_response_code(404);

    echo json_encode([
        "message" => "Не найдено"
    ]);

    die();
}

echo json_encode($result);

?>