<?

$explode = explode('/', $_GET['http']);
$id = (int) $explode[1];

if ($id) {
    echo json_encode(City::getWithCountryOne($id)); 
}

?>