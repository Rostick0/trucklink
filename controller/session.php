<?

function getSession($session_token) {
    $session = Model::get('authorization', 'session_token', "$session_token");

    if ($session) {
        $_SESSION['user']['id'] = $session['user_id'];
    }
}

session_start();

// if (!$_SESSION['user']['id']) {
//     getSession($_COOKIE["session_token"]);
// }
?>