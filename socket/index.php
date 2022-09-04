<?

use Workerman\Worker;

require_once __DIR__ . './../require.php';
require_once __DIR__ . './../vendor/autoload.php';

$user = [];
$_SESSION['user']['id'] = null;

$ws_worker = new Worker('websocket://0.0.0.0:2346');
$ws_worker->count = 4;

$ws_worker->onWorkerStart = function() use (&$user) {
    $inner_tcp_worker = new Worker("tcp://127.0.0.1:1234");
    $inner_tcp_worker->onMessage = function($connection, $data) use (&$user) {
        global $ws_worker;

        $data = json_decode($data);
        if (isset($user[$data->user])) {
            $webconnection = $user[$data->user];
            $user_id = (int) $data->user_id;
            $_SESSION['user']['id'] = $user_id;
            User::updateOnline($user_id, 1);

            echo "Пользователь с id $user_id подключился \n";

            $ws_worker->onMessage = function ($connection, $data) use ($ws_worker, $user_id) {
                var_dump($data);
                $message = json_decode($data);
                var_dump($message->user_to);
                $id = Message::create($message->text, $user_id, $message->user_to);
                $result = Model::get('message', 'message_id', $id);

                var_dump($result);

                foreach($ws_worker->connections as $clientConnection) {
                    $clientConnection->send(json_encode($result));
                }
            };
        }
    };

    $inner_tcp_worker->listen();
};

$ws_worker->onConnect = function ($connection) use (&$user) {
    $connection->onWebSocketConnect = function($connection) use (&$user) {
        $user[$_COOKIE['PHPSESSID']] = $connection;
    };
};

$ws_worker->onClose = function ($connection) {
    $user_id = (int) $_SESSION['user']['id'];

    User::updateOnline($user_id, 0);

    echo "Пользователь с id $user_id вышел \n";
};

Worker::runAll();

?>