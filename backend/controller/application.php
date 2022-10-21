<?

class ApplicationController {
    public static function firstCreate($from, $to, $date, $transport_type) {
        $from = protectedData($from);
        $to = protectedData($to);
        $date = protectedData($date);
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

    public static function thirdCreate($body_type, $loading_method,  $size, $height, $mass, $price) {
        global $db;

        $body_type = (int) $body_type;
        $loading_method = (int) $loading_method;
        $size = (int) $size;
        $height = (int) $height;
        $mass = (float) $mass;
        $price = (float) $price;

        $errors = [];

        if (!$price) {
            $errors['price'] = "Не указана стоимость";
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

        $query = Application::create($from, $to, $date, $transport_type, $fullname, $telephone, $email, $user_id, $body_type, $loading_method, $size, $height, $mass, $price);

        if ($query) {
            header('Location: ./create?page=3');
        }
    }

    public static function create($from, $to, $date, $type_transport, $user_fullname, $user_telephone, $user_email, $user_id, $body_type, $loading_method,  $size, $height, $mass, $price) {

        return Application::create($from, $to, $date, $type_transport, $user_fullname, $user_telephone, $user_email, $user_id, $body_type, $loading_method,  $size, $height, $mass, $price);
    }
}

?>