<?php

use Workerman\Worker;

require_once __DIR__ . '/require.php';

$users = [];

$ws_worker = new Worker('websocket://0.0.0.0:2346');
$ws_worker->count = 4;

$ws_worker->onConnect = function ($connection) use (&$users) {
    $connection->onWebSocketConnect = function ($connection) use (&$users) {
        $user_id = (int) $_GET['user_id'];
        $users[$user_id] = $connection;
        Online::set($user_id, 1);
        var_dump($user_id);
    };
};

$ws_worker->onMessage = function ($connection, $data) use ($ws_worker, &$users) {
    $data = json_decode($data);

    switch ($data->type) {
        case "message":
            var_dump($data);
            $user_from = array_search($connection, $users);
            $user_to = $users[$data->user_to];
            $user_to_send = $user_to ? $user_to : $data->user_to;

            $query = MessageController::create($data->text, $data->application_id, $user_from, $user_to_send);

            if (!$query) break;

            $connection->send(json_encode($data));

            if (!$user_to) break;

            $user_to->send(json_encode($data));

            break;
    }
};

$ws_worker->onClose = function ($connection) use (&$users) {
    $user_id = array_search($connection, $users);
    unset($users[$user_id]);
    Online::set($user_id, 0);
    var_dump($user_id);
};

Worker::runAll();

?>