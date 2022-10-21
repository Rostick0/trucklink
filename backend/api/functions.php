<?

function messageError($message, $code) {
    http_response_code($code);

    return json_encode([
        'type' => 'error',
        'message' => $message
    ]);
}

?>