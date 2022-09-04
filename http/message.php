<?

$user_first = (int) $_GET['user_first'];
$user_second = $_SESSION['user']['id'] ? $_SESSION['user']['id'] : 33;
$limit = (int) $_GET['limit'];
$offset = (int) $_GET['offset'];

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

?>