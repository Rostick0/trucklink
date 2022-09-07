<?

use Workerman\Worker;

require_once __DIR__ . './../require.php';
require_once __DIR__ . './../vendor/autoload.php';

$users = [];

$ws_worker = new Worker('websocket://0.0.0.0:2346');
$ws_worker->count = 4;

// $ws_worker->onWorkerStart = function() use (&$user) {
//     global $ws_worker;

//     $inner_tcp_worker = new Worker("tcp://127.0.0.1:1234");
    
//     $inner_tcp_worker->onMessage = function($connection, $data) use (&$user) {
//         global $ws_worker;

//         var_dump($data);
//         $data = json_decode($data);
//         var_dump($data);
//         if (isset($user[$data->user])) {
//             $webconnection = $user[$data->user];
//             $user_id = (int) $data->user_id;
//             $_SESSION['user']['id'] = $user_id;
//             User::updateOnline($user_id, 1);

//             echo "Пользователь с id $user_id подключился \n";

//             $ws_worker->onMessage = function ($connection, $data) use ($ws_worker, $user_id) {
//                 $data = json_decode($data);
//                 // var_dump($data);

//                 if ($data->type == 'user_id') {
//                     var_dump($data);
//                 }

//                 if ($data->type == 'message') {
//                     $message = $data;
//                     $id = Message::create($message->text, $user_id, $message->user_to);
//                     $result = Model::get('message', 'message_id', $id) + ['type' => 'message'];

//                     foreach($ws_worker->connections as $clientConnection) {
//                         $clientConnection->send(json_encode($result));
//                     }
//                 }

//                 if ($data->type == 'message_read') {
//                     Message::setRead($data->message_id);
//                     var_dump($data);

//                     $result = ['message_id' => $data->message_id] + ['type' => 'message_read'];

//                     foreach($ws_worker->connections as $clientConnection) {
//                         $clientConnection->send(json_encode($result));
//                     }
//                 }
//             };
//         }
//     };

//     $inner_tcp_worker->listen();

//     $inner_tcp_worker->onClose = function ($connection) {
//         $user_id = (int) $_SESSION['user']['id'];
    
//         User::updateOnline($user_id, 0);
    
//         echo "Пользователь с id $user_id вышел \n";
//     };
// };

function connectUser($user_id) {
    global $ws_worker;
    
    var_dump($user_id);

    User::updateOnline($user_id, 1);

    var_dump("Вошел в сети $user_id");

    $ws_worker->onClose = function($connection) use ($user_id) {
        var_dump($user_id . " выход");
        return exitUser($user_id);
    };


    // $ws_worker->onClose = exitUser($user_id);
}

function exitUser($user_id) {
    User::updateOnline($user_id, 0);

    var_dump("Вышел из сети $user_id");
}

$ws_worker->onMessage = function ($connection, $data) use ($ws_worker) {
    $data = json_decode($data);

    if ($data->type == 'auth' && !$_SESSION['user']['id']) {
        $check = Authorization::checkSession((int) $data->user_id, $data->session_token);

        if ($check->num_rows > 0) {
            $user_id = (int) $data->user_id;

            $users[$user_id] = $user_id;

            connectUser($users[$user_id]);
        }
    }

    if ($data->type == 'message') {
        $message = $data;
        $id = Message::create($message->text, $message->user_from, $message->user_to);
        $result = Model::get('message', 'message_id', $id) + ['type' => 'message'];

        foreach($ws_worker->connections as $clientConnection) {
            $clientConnection->send(json_encode($result));
        }
    }

    if ($data->type == 'message_read') {
        Message::setRead($data->message_id);
        var_dump($data);

        $result = ['message_id' => $data->message_id] + ['type' => 'message_read'];

        foreach($ws_worker->connections as $clientConnection) {
            $clientConnection->send(json_encode($result));
        }
    }
};

$ws_worker->onConnect = function ($connection) use (&$user) {
    $connection->onWebSocketConnect = function($connection) use (&$user) {
        $user[$_COOKIE['PHPSESSID']] = $connection;
    };
};

Worker::runAll();

?>