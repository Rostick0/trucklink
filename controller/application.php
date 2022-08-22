<?

class ApplicationController {
    static public function create($price, $from, $to, $transport_upload_id, $upload_type_id, $application_type_id, $is_any_direction, $date_start, $date_end, $user_id, $volume, $weight, $length, $width, $height, $description, $type, $has_price) {
        if ($has_price) {
            $price = null;
        }

        Application::create($price, $from, $to, $transport_upload_id, $upload_type_id, $application_type_id, $is_any_direction, $date_start, $date_end, $user_id, $volume, $weight, $length, $width, $height, $description, $type);
    }
}

if (isset($_REQUEST['create_cargo'])) {
    $price = (int) ($_REQUEST['price']);
    $has_price = (boolean) $_REQUEST['has_price'];
    $from = protectionData($_REQUEST['from']);
    $to = protectionData($_REQUEST['to']);
    $date_start = normalizeDateSql(protectionData($_REQUEST['date_start']));
    $date_end = normalizeDateSql(protectionData($_REQUEST['date_end']));
    $transport_upload_id = (int) ($_REQUEST['transport_upload']);
    $upload_type_id = (int) ($_REQUEST['upload_type']);
    $is_any_direction = (boolean) ($_REQUEST['is_any_direction']);
    $is_any_direction = $is_any_direction ? 1 : 0;
    $volume = (int) ($_REQUEST['volume']);
    $weight = (int) ($_REQUEST['weight']);
    $length = (int) ($_REQUEST['length']);
    $width = (int) ($_REQUEST['width']);
    $height = (int) ($_REQUEST['height']);
    $description = protectionData($_REQUEST['description']);
    $type = protectionData($_REQUEST['type']);

    ApplicationController::create($price, $from, $to, $transport_upload_id, $upload_type_id, 1, $is_any_direction, $date_start, $date_end, 17, $volume, $weight, $length, $width, $height, $description, $type, $has_price);
}

if (isset($_REQUEST['create_transport'])) {
    $price = (int) ($_REQUEST['price']);
    $has_price = (boolean) $_REQUEST['has_price'];
    $from = protectionData($_REQUEST['from']);
    $to = protectionData($_REQUEST['to']);
    $date_start = normalizeDateSql(protectionData($_REQUEST['date_start']));
    $date_end = normalizeDateSql(protectionData($_REQUEST['date_end']));
    $transport_upload_id = (int) ($_REQUEST['transport_upload']);
    $upload_type_id = (int) ($_REQUEST['upload_type']);
    $is_any_direction = (boolean) ($_REQUEST['is_any_direction']);
    $is_any_direction = $is_any_direction ? 1 : 0;
    $volume = (int) ($_REQUEST['volume']);
    $weight = (int) ($_REQUEST['weight']);
    $length = (int) ($_REQUEST['length']);
    $width = (int) ($_REQUEST['width']);
    $height = (int) ($_REQUEST['height']);
    $description = protectionData($_REQUEST['description']);
    $type = protectionData($_REQUEST['type']);

    ApplicationController::create($price, $from, $to, $transport_upload_id, $upload_type_id, 2, $is_any_direction, $date_start, $date_end, $_SESSION['user']['id'], $volume, $weight, $length, $width, $height, $description, $type, $has_price);
}

if (isset($_REQUEST['edit_application'])) {
    
}

?>