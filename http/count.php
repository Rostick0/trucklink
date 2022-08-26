<?

$my_applicatioon = $_GET['my_application'] ? true : "";
$where_params = ApplicationSearchController::getVars();
$type = parseStrGet('type');
$result = null;

switch ($type) {
    case 'transport':
        if ($my_applicatioon) {
            $result = [
                "count" => Application::countMy(2, $_SESSION['user']['id'])
            ];
        } else {
            $where_params = "AND `application`.`application_type_id` = 2 " . $where_params;

            $result = [
                "count" => Application::count($where_params)
            ];
        }

        break;
    case 'cargo':
        if ($my_applicatioon) {
            $result = [
                "count" => Application::countMy(1, $_SESSION['user']['id'])
            ];
        } else {
            $where_params = "AND `application`.`application_type_id` = 1 " . $where_params;

            $result = [
                "count" => Application::count($where_params)
            ];
        }

        break;
}

if ($result) {
    echo json_encode($result);
}

?>