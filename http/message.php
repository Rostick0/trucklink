<?

$user_first = (int) $_GET['user_first'];
$user_second = $_SESSION['user']['id'];
$limit = (int) $_GET['limit'];
$offset = (int) $_GET['offset'];
$type = $_GET['type'];

$message_id = parseIntGet('message_id');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $messages = Message::get($user_second, $user_first, $limit, $offset);

        $result = [];
        
        foreach ($messages as $message) {
            if ($user_second == $message['user_from']) {
                $message['from_me'] = true;
            }
        
            $result[] = $message;
        }
        
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
        
            echo json_encode([
                'error' => 'Не найдено'
            ]);
        }
        break;
    case 'PUT':
        if ($type == 'read') {
            Message::setRead($message_id);
        }
        break;
}


?>