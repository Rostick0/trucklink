<?

$type = parseStrGet('type');
$my_applicatioon = $_GET['my_application'] ? true : "";

switch ($type) {
    case 'transport':
        if ($my_applicatioon) {
            $result = [
                "count" => Application::count(2, $_SESSION['user']['id'])
            ];
        } else {
            $result = [
                "count" => Model::count('application', 'application_type_id', 2)
            ];
        }

        echo json_encode($result);

        break;
    case 'cargo':
        if ($my_applicatioon) {
            $result = [
                "count" => Application::count(1, $_SESSION['user']['id'])
            ];
        } else {
            $result = [
                "count" => Model::count('application', 'application_type_id', 1)
            ];
        }

        echo json_encode($result);
        break;
}

?>