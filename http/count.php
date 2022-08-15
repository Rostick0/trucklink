<?

$type = parseStrGet('type');

switch ($type) {
    case 'transport':
        $result = [
            "count" => Model::count('application', 'application_type_id', 2)
        ];

        echo json_encode($result);
        break;
    case 'cargo':
        $result = [
            "count" => Model::count('application', 'application_type_id', 1)
        ];

        echo json_encode($result);
        break;
}

?>