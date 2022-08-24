<?

class ApplicationController {
    static public function create($price, $from, $to, $transport_upload_id, $upload_type_id, $application_type_id, $is_any_direction, $date_start, $date_end, $user_id, $volume, $weight, $length, $width, $height, $description, $type, $has_price) {
        $error = false;

        if (!$price) {
            $_SESSION['error_price'] = "Добавьте цену";

            $error = true;
        }
        
        if ($has_price) {
            $price = null;

            $_SESSION['error_price'] = null;

            $error = false;
        }

        if (!$from) {
            $_SESSION['error_from'] = "Не выбрана страна";

            $error = true;
        }

        if (!$to) {
            $_SESSION['error_to'] = "Не выбрана страна";

            $error = true;
        }

        if (!$date_start) {
            $_SESSION['error_date_start'] = "Не выбрана дата";

            $error = true;
        }

        if (!$date_end) {
            $_SESSION['error_date_end'] = "Не выбрана дата";

            $error = true;
        }

        if (!$transport_upload_id) {
            $_SESSION['error_transport_upload'] = "Не выбран тип транспорта";

            $error = true;
        }

        if (!$upload_type_id) {
            $_SESSION['error_upload_type'] = "Не выбран тип загрузки";

            $error = true;
        }
        
        if ($error) {
            return;
        }

        Application::create($price, $from, $to, $transport_upload_id, $upload_type_id, $application_type_id, $is_any_direction, $date_start, $date_end, $user_id, $volume, $weight, $length, $width, $height, $description, $type);
    }

    static public function edit($price, $from, $to, $date_start, $date_end, $transport_upload_id, $upload_type_id, $volume, $weight, $length, $width, $height, $description, $type, $user_id, $application_id, $has_price) {
        $error = false;

        if (!$price) {
            $_SESSION['error_price'] = "Добавьте цену";

            $error = true;
        }
        
        if ($has_price) {
            $price = null;

            $_SESSION['error_price'] = null;

            $error = false;
        }

        if (!$from) {
            $_SESSION['error_from'] = "Не выбрана страна";

            $error = true;
        }

        if (!$to) {
            $_SESSION['error_to'] = "Не выбрана страна";

            $error = true;
        }

        if (!$date_start) {
            $_SESSION['error_date_start'] = "Не выбрана дата";

            $error = true;
        }

        if (!$date_end) {
            $_SESSION['error_date_end'] = "Не выбрана дата";

            $error = true;
        }

        if (!$transport_upload_id) {
            $_SESSION['error_transport_upload'] = "Не выбран тип транспорта";

            $error = true;
        }

        if (!$upload_type_id) {
            $_SESSION['error_upload_type'] = "Не выбран тип загрузки";

            $error = true;
        }
        
        if ($error) {
            return;
        }

        Application::edit($price, $from, $to, $date_start, $date_end, $transport_upload_id, $upload_type_id, $volume, $weight, $length, $width, $height, $description, $type, $user_id, $application_id);
    }

    static public function httpHide($user_id, $application_id) {
        if (!$user_id) {
            $code = "401";
            $error = "Нет авторизаци";
        }

        if (!$application_id) {
            $code = "404";
            $error = "Не выбран id заявки";
        }

        if ($error) {
            http_response_code($code);

            echo json_encode([
                "error" => $error
            ]);

            return;
        }

        $query = Application::hide($user_id, $application_id);

        if (!$query) {
            http_response_code(400);

            echo json_encode([
                "error" => "Заявка не удалена"
            ]);
        } else {
            echo json_encode([
                "status" => true
            ]);
        }
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

    var_dump($_REQUEST['date_start'], $date_start);

    ApplicationController::create($price, $from, $to, $transport_upload_id, $upload_type_id, 1, $is_any_direction, $date_start, $date_end, $_SESSION['user']['id'], $volume, $weight, $length, $width, $height, $description, $type, $has_price);
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
    $price = (int) ($_REQUEST['price']);
    $has_price = (boolean) $_REQUEST['has_price'];
    $from = protectionData($_REQUEST['from']);
    $to = protectionData($_REQUEST['to']);
    $date_start = normalizeDateSql(protectionData($_REQUEST['date_start']));
    $date_end = normalizeDateSql(protectionData($_REQUEST['date_end']));
    $transport_upload_id = (int) ($_REQUEST['transport_upload']);
    $upload_type_id = (int) ($_REQUEST['upload_type']);
    $volume = (int) ($_REQUEST['volume']);
    $weight = (int) ($_REQUEST['weight']);
    $length = (int) ($_REQUEST['length']);
    $width = (int) ($_REQUEST['width']);
    $height = (int) ($_REQUEST['height']);
    $description = protectionData($_REQUEST['description']);
    $application_id = (int) $_GET['id'];
    $type = protectionData($_REQUEST['type']);

    ApplicationController::edit($price, $from, $to, $date_start, $date_end, $transport_upload_id, $upload_type_id, $volume, $weight, $length, $width, $height, $description, $type, $_SESSION['user']['id'], $application_id, $has_price);
}

?>