<?

class ApplicationController {
    public static function firstCreate($from, $to, $date, $transport_type) {
        $from = protectedData($from);
        $to = protectedData($to);
        $date = DateView::normalizeDateSql($date);
        $transport_type = protectedData($transport_type);

        $errors = [];

        if (mb_strlen($from) < 2) {
            $errors['from'] = "Не указано откуда";
        }

        if (mb_strlen($to) < 2) {
            $errors['to'] = "Не указано куда";
        }

        if (!$date) {
            $errors['date'] = "Нет даты";
        }

        if (!$transport_type) {
            $errors['transport_type'] = "Не выбран транспорт";
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'data' => $errors
            ];
        }

        $_SESSION['application'] = [
            'from' => $from,
            'to' => $to,
            'date' => $date,
            'transport_type' => $transport_type
        ];
        header('Location: ./create');
    }

    public static function secondCreate($fullname, $telephone, $email) {
        $fullname = protectedData($fullname);
        $telephone = normalizeTepelhone($telephone);
        $email = protectedData($email);

        $errors = [];

        if (mb_strlen($fullname) < 3) {
            $errors['fullname'] = "Меньше 3 символов";
        }

        if (mb_strlen($telephone) < 7) {
            $errors['telephone'] = "Меньше 7 символов";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Неправильная почта";
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'data' => $errors
            ];
        }

        $_SESSION['application']['fullname'] = $fullname;
        $_SESSION['application']['telephone'] = $telephone;
        $_SESSION['application']['email'] = $email;
        header('Location: ./create?page=2');
    }

    public static function thirdCreate($loading_method,  $size, $height, $photo, $mass, $price, $comment) {
        global $ALLOWED_IMAGE_TYPES;

        $loading_method = (int) $loading_method;
        $size = (int) $size;
        $height = (int) $height;
        $mass = (float) $mass;
        $price = (float) $price;
        $comment = protectedData($comment);

        $errors = [];

        if (!empty($photo['name']) && !array_search($photo['type'], $ALLOWED_IMAGE_TYPES)) {
            $errors['photo'] = 'Не поддерживается формат фотографии';
        } else {
            $photo = ImageController::uploadImage($photo);
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'data' => $errors
            ];
        }

        $from = $_SESSION['application']['from'];
        $to = $_SESSION['application']['to'];
        $date = $_SESSION['application']['date'];
        $transport_type = $_SESSION['application']['transport_type'];
        $fullname = $_SESSION['application']['fullname'];
        $user_id = $_SESSION['user']['user_id'];
        $telephone = $_SESSION['application']['telephone'];
        $email = $_SESSION['application']['email'];

        $query = Application::create($from, $to, $date, $transport_type, $fullname, $telephone, $email, $user_id, $loading_method, $size, $height, $photo, $mass, $price, $comment);

        if ($query) {
            header('Location: ./create?page=3');
        }
    }

    public static function edit($from, $to, $date, $transport_type, $loading_method, $size, $height, $photo, $mass, $price, $comment, $application_id, $date_created) {
        $errors = [];

        $from = protectedData($from);
        $to = protectedData($to);
        $date = DateView::normalizeDateSql($date);
        $transport_type = (int) $transport_type;
        $loading_method = (int) $loading_method;
        $size = (int) $size;
        $height = (int) $height;
        $mass = (float) $mass;
        $price = (float) $price;
        $comment = protectedData($comment);
        $user_id = (int) $_SESSION['user']['user_id'];

        // if ($date_created) {
        //     $errors['from'] = "Заявку больше нельзя изменить";
        // }

        if (mb_strlen($from) < 2) {
            $errors['from'] = "Не указано откуда";
        }

        if (mb_strlen($to) < 2) {
            $errors['to'] = "Не указано куда";
        }

        if (!empty($errors)) {
            return [
                'type' => 'error',
                'data' => $errors
            ];
        }

        Application::edit($from, $to, $date, $transport_type, $loading_method, $size, $height, $photo, $mass, $price, $comment, $application_id, $user_id);
    }

    // public static function create($from, $to, $date, $type_transport, $user_fullname, $user_telephone, $user_email, $user_id, $body_type, $loading_method,  $size, $height, $mass, $price) {
    //     return Application::create($from, $to, $date, $type_transport, $user_fullname, $user_telephone, $user_email, $user_id, $body_type, $loading_method,  $size, $height, $mass, $price);
    // }

    public static function httpDelete($application_id, $user_id) {
        $error = '';
        $code = 200;

        if (!$application_id) {
            $code = 404;

            $error = 'application not found';
        }

        if (!$user_id) {
            $code = 401;

            $error = 'no authorization';
        }

        if ($error) {
            http_response_code($code);

            echo json_encode(
                [
                    'type' => 'error',
                    'message' => $error
                ]
            );

            return;
        }

        $query = Application::delete($application_id, $user_id);

        if ($query) {
            echo json_encode(
                [
                    'message' => 'application deleted'
                ]
            );
            return;
        }

        http_response_code(403);

        echo json_encode(
            [
                'type' => 'error',
                'message' => 'no access'
            ]
        );
    }
}

?>