<?

function getApplication($type_application) {
    $where_params = ApplicationSearchController::getVars();

    $applications = Application::getHttp($type_application, $where_params);
    $result = [];

    $user_id = parseIntGet('user_id');

    foreach ($applications as $application) {
        $application['from'] = City::getWithCountryOne($application['from']);
        $application['to'] = City::getWithCountryOne($application['to']);

        if ((int) $_SESSION['user']['id'] === $user_id) {
            $application['my_application'] = true;
        }

        $result[] =  $application;
    }

    if (empty($result)) {
        http_response_code(404);

        echo json_encode([
            "message" => "Не найдено"
        ]);
        return;
    }

    echo json_encode($result);
}

?>