<?

if (!$_SESSION['user']['id']) {
    getSession($_COOKIE["session_token"]);
}

?>