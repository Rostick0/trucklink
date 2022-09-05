<?

$user_id = $_SESSION['user']['id'] ? $_SESSION['user']['id'] : 33;
$limit = parseIntGet('limit');
$offset = parseIntGet('offset');

ChatController::getUsers($user_id, $limit, $offset);

?>