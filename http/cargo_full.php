<?

$data = Application::getCargo(0, 10);
$arr = [];

foreach($data as $d) {
    $arr[] = $d;
}

echo json_encode($arr);

?>