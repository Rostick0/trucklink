<?

class ApplicationSearchController {

}

if (isset($_REQUEST['search_application'])) {
    var_dump($_REQUEST);

    $price_min = (int) $_REQUEST['price_min'];
    $price_max = (int) $_REQUEST['price_max'];
    $volume_min = (int) $_REQUEST['volume_min'];
}

?>