<?

$type = $_GET['type'];

if ($type == 'id') {
    function noAuth() {
        http_response_code(401);

        echo json_encode([
            'error' => 'Нет авторизации'
        ]);

        die();
    }

    if (!$_SESSION['user']['id']) {
        noAuth();
    }

    $session_token = Model::get('authorization', 'user_id', $_SESSION['user']['id']);

    if (!$session_token) {
        noAuth();
    }

    $session_token = $session_token['session_token'];

    echo json_encode([
        'user_id' => $_SESSION['user']['id'],
        'session_token' => $session_token
    ]);
}

?>