<?

$where_params = ApplicationSearchController::getVars();

$transports = Application::getHttp(2, $where_params);
$result = [];

foreach ($transports as $transport) {
    $transport['from'] = City::getWithCountryOne($transport['from']);
    $transport['to'] = City::getWithCountryOne($transport['to']);
    $result[] = $transport;
}

echo json_encode($result);

?>