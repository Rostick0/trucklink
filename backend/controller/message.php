<?

class MessageController {
    public static function create($text, $application_id, $user_id) {
        $text = protectedData($text);
        $application_id = (int) $application_id;
        $user_id = (int) $user_id;

        $errors = [];

        if (!trim($text)) {
            $errors[] = 'Не введен текст';
        }

        if (!$application_id) {
            $errors[] = 'Не выбрана заявка';
        }

        if (!$user_id) {
            $errors[] = 'Не выбран пользователь';
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'message' => array_shift($errors)
            ];
        }

        return Message::create($text, $application_id, $user_id);
    }
}

?>