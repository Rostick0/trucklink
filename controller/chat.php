<?

class ChatController {
    static public function getUsers($user_id, $limit = 10, $offset = null) {
        $query = Chat::getUsers($user_id, $limit, $offset);

        $user_ids = [];
        
        foreach ($query as $data) {
            $user_ids[] = $data;
        }

        $users = [];

        foreach($user_ids as $user) {
            if ($user['user_id'] == $user_id) {
                continue;
            }

            $user_data = Model::get('user', 'user_id', $user['user_id']);
            $user_last_message = Message::lastMessage($user['user_id'], $user_id);

            $users[] = $user_data + ['last_message' => $user_last_message];
        }

        echo json_encode($users);
    }
}

?>