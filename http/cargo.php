<?

$where_params = ApplicationSearchController::getVars();

$cargos = Application::getHttp(1, $where_params);
$result = [];

foreach ($cargos as $cargo) {
    $cargo['from'] = City::getWithCountryOne($cargo['from']);
    $cargo['to'] = City::getWithCountryOne($cargo['to']);
    $result[] = $cargo;
}

echo json_encode($result);

?>