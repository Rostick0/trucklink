<?

function getSession($session_token) {
    if (!$session_token) {
        return;
    }

    $session = Model::get('authorization', 'session_token', "$session_token");

    if ($session) {
        $_SESSION['user']['id'] = $session['user_id'];
    }
}

session_start();

?>