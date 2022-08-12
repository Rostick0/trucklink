<?

$cargos = Application::getHttp(1);
$result = [];

foreach ($cargos as $cargo) {
    $cargo['from'] = City::getWithCountryOne($cargo['from']);
    $cargo['to'] = City::getWithCountryOne($cargo['to']);
    $result[] = $cargo;
}

echo json_encode($result);

?>