<?

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    UserController::setAvatar($_SESSION['user']['id'], $_FILES['avatar']);
}

?>