<?

use Workerman\Worker;

require_once __DIR__ . './../require.php';
require_once __DIR__ . './../vendor/autoload.php';

$users = [];

$ws_worker = new Worker('websocket://0.0.0.0:2346');
$ws_worker->count = 4;

function connectUser($user_id) {
    User::updateOnline($user_id, 1);

    var_dump("Вошел в сети $user_id");
}

$ws_worker->onMessage = function ($connection, $data) use ($ws_worker) {
    $data = json_decode($data);

    if ($data->type == 'auth') {
        $check = Authorization::checkSession((int) $data->user_id, $data->session_token);

        if ($check->num_rows > 0) {
            $user_id = (int) $data->user_id;

            connectUser($user_id);
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

        $result = ['message_id' => $data->message_id] + ['type' => 'message_read'];

        foreach($ws_worker->connections as $clientConnection) {
            $clientConnection->send(json_encode($result));
        }
    }
};

// $ws_worker->onConnect = function ($connection) use (&$user) {

// };

Worker::runAll();

?>