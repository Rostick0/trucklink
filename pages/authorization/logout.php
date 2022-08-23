<?
$_SESSION['user']['id'] = null;
setcookie("session_token", $session_token, 0);
Router::location("/");
?>