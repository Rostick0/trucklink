<?

$type = $_GET['type'];

if ($type == 'id') {
    echo json_encode([
        'user_id' => $_SESSION['user']['id']
    ]);
}

?>