<?

class Email {
    public static function codeRegistration($email)
    {
        global $EMAIL;
        
        $_SESSION['email_code'] = random_int(100000, 999999);

        $to      = "$email";
        $subject = 'the subject';
        $message = "Ваш код для потверждения регистрации";
        $headers = "From: $EMAIL"       . "\r\n" .
            "Reply-To: $EMAIL" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        if (!mail($to, $subject, $message, $headers)) {
            return [
                'type' => 'error',
                'data' => [
                    'email' => 'Не удалось отправить код'
                ]
            ];
        }
    }
}

?>