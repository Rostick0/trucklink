<?

$where_params = ApplicationSearchController::getVars();

$cargos = Application::getHttp(1, $where_params);
$result = [];

foreach ($cargos as $cargo) {
    $cargo['from'] = City::getWithCountryOne($cargo['from']);
    $cargo['to'] = City::getWithCountryOne($cargo['to']);
    $result[] = $cargo;
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