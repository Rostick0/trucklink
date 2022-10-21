<?

use Workerman\Worker;

//require_once __DIR__ . './../require.php';
require_once __DIR__ . './../vendor/autoload.php';

$users = [];

$ws_worker = new Worker('websocket://0.0.0.0:2346');
$ws_worker->count = 4;

function connectUser($user_id)
{
    var_dump("Вошел в сети $user_id");
}

$ws_worker->onConnect = function ($connection) use ($users) {
    $connection->onWebSocketConnect = function($connection) use (&$users)
    {
        // при подключении нового пользователя сохраняем get-параметр, который же сами и передали со страницы сайта
        $users[$_GET['application_id']] = $connection;
        // вместо get-параметра можно также использовать параметр из cookie, например $_COOKIE['PHPSESSID']
    };
};

$ws_worker->onMessage = function ($connection, $data) use ($ws_worker) {
    $data = json_decode($data);

    switch ($data->type) {
        case "message":
            $result = $data;

            foreach ($ws_worker->connections as $clientConnection) {
                $clientConnection->send(json_encode($result));
            }

            break;
    }
};

$ws_worker->onClose = function($connection) use ($users) {
    $user = array_search($connection, $users);
    unset($users[$user]);
    var_dump($users);
};

Worker::runAll();
