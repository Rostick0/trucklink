<?

class MessageController {
    public static function create($text, $application_id, $user_from, $user_to) {
        $text = protectedData($text);
        $application_id = (int) $application_id;
        $user_from = (int) $user_from;
        $user_to = (int) $user_to;

        $errors = [];

        if (!trim($text)) {
            $errors[] = 'Не введен текст';
        }

        if (!$application_id) {
            $errors[] = 'Не выбрана заявка';
        }

        if (!$user_from) {
            $errors[] = 'Не выбран пользователь';
        }

        if (!$user_to) {
            $errors[] = 'Не выбран пользователь';
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'message' => array_shift($errors)
            ];
        }

        return Message::create($text, $application_id, $user_from, $user_to);
    }
}

?>