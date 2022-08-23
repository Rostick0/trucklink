<?

$id = parseIntGet('id');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    ApplicationController::httpHide($_SESSION['user']['id'], $id);
}

?>