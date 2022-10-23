<?

$page_count = (int) $_GET['page'];

if ($page_count == 2) {
    die(require_once './view/pages/create/create2.php');
} else if ($page_count == 3) {
    die(require_once './view/pages/create/create3.php');
}

$user_fullname = $_REQUEST['user_fullname'];
$user_telephone = $_REQUEST['user_telephone'];
$user_email = $_REQUEST['user_email'];
$button_create = $_REQUEST['button_create'];

if (isset($button_create)) {
    $query = ApplicationController::secondCreate($user_fullname, $user_telephone, $user_email);
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <? require_once __DIR__ . './../../components/meta.php' ?>
    <? require_once __DIR__ . './../../components/style.php' ?>
    <title>Контактная информация</title>
</head>

<body>
    <div class="wrapper applicaton-create">
        <? require_once __DIR__ . './../../components/header.php'; ?>
        <main class="main">
            <div class="container">
                <div class="applicaton-create__main">
                    <div class="applicaton-create__top">
                        <div class="applicaton-create__link">
                            <div class="applicaton-create__arrow">
                                <svg width="1rem" height="0.69rem" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.195001 5.04502L4.875 0.201097C5.00092 0.0766103 5.1691 0.00790116 5.34354 0.00967715C5.51797 0.0114531 5.6848 0.0835732 5.80831 0.210599C5.93183 0.337626 6.00221 0.509464 6.00439 0.68933C6.00658 0.869197 5.94039 1.0428 5.82 1.17297L2.3025 4.813H15.3325C15.4234 4.80726 15.5145 4.82076 15.6002 4.85269C15.6859 4.88462 15.7643 4.93429 15.8307 4.99865C15.897 5.06301 15.9499 5.14069 15.986 5.22692C16.0222 5.31314 16.0408 5.40608 16.0408 5.50002C16.0408 5.59395 16.0222 5.6869 15.986 5.77312C15.9499 5.85935 15.897 5.93703 15.8307 6.00139C15.7643 6.06575 15.6859 6.11542 15.6002 6.14735C15.5145 6.17928 15.4234 6.19278 15.3325 6.18704H2.25L5.8175 9.82449C5.88537 9.8867 5.94022 9.96253 5.97868 10.0474C6.01715 10.1322 6.03843 10.2242 6.04121 10.3178C6.044 10.4114 6.02824 10.5046 5.99489 10.5917C5.96154 10.6788 5.91131 10.7579 5.84727 10.8243C5.78323 10.8907 5.70673 10.9429 5.62244 10.9778C5.53816 11.0126 5.44786 11.0294 5.35708 11.027C5.2663 11.0246 5.17695 11.0032 5.09449 10.964C5.01203 10.9247 4.93819 10.8686 4.8775 10.7989L0.197501 6.01947C0.135366 5.95554 0.0860701 5.87959 0.0524359 5.79599C0.0188007 5.71238 0.00148773 5.62276 0.00148773 5.53224C0.00148773 5.44173 0.0188007 5.3521 0.0524359 5.2685C0.0860701 5.18489 0.135366 5.10895 0.197501 5.04502H0.195001Z" fill="#9A9A9A" />
                                </svg>
                            </div>
                            <a href="/" class="applicaton-create__href link">
                                назад
                            </a>
                        </div>
                        <div class="applicaton-create__title section-title">
                            Добавить груз
                        </div>
                        <!-- <div class="applicaton-create__link">
                            <a href="/pages/cargo-create2.html" class="applicaton-create__href link">
                                пропустить
                            </a>
                            <div class="applicaton-create__arrow">
                                <svg width="1rem" height="0.69rem" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8051 5.04502L11.1251 0.201097C10.9991 0.0766103 10.831 0.00790116 10.6565 0.00967715C10.4821 0.0114531 10.3153 0.0835732 10.1917 0.210599C10.0682 0.337626 9.99785 0.509464 9.99567 0.68933C9.99348 0.869197 10.0597 1.0428 10.1801 1.17297L13.6976 4.813H0.66756C0.576634 4.80726 0.48553 4.82076 0.399857 4.85269C0.314183 4.88462 0.235754 4.93429 0.169399 4.99865C0.103043 5.06301 0.0501646 5.14069 0.0140198 5.22692C-0.022125 5.31314 -0.0407715 5.40608 -0.0407715 5.50002C-0.0407715 5.59395 -0.022125 5.6869 0.0140198 5.77312C0.0501646 5.85935 0.103043 5.93703 0.169399 6.00139C0.235754 6.06575 0.314183 6.11542 0.399857 6.14735C0.48553 6.17928 0.576634 6.19278 0.66756 6.18704H13.7501L10.1826 9.82449C10.1147 9.8867 10.0598 9.96253 10.0214 10.0474C9.98291 10.1322 9.96163 10.2242 9.95885 10.3178C9.95606 10.4114 9.97182 10.5046 10.0052 10.5917C10.0385 10.6788 10.0887 10.7579 10.1528 10.8243C10.2168 10.8907 10.2933 10.9429 10.3776 10.9778C10.4619 11.0126 10.5522 11.0294 10.643 11.027C10.7338 11.0246 10.8231 11.0032 10.9056 10.964C10.988 10.9247 11.0619 10.8686 11.1226 10.7989L15.8026 6.01947C15.8647 5.95554 15.914 5.87959 15.9476 5.79599C15.9813 5.71238 15.9986 5.62276 15.9986 5.53224C15.9986 5.44173 15.9813 5.3521 15.9476 5.2685C15.914 5.18489 15.8647 5.10895 15.8026 5.04502H15.8051Z" fill="#9A9A9A" />
                                </svg>
                            </div>
                        </div> -->
                    </div>
                    <div class="applicaton-create__subtitle section-subtitle">
                        Контактная информация
                    </div>
                    <form class="applicaton-create__form" method="POST">
                        <div class="input__block">
                            <label class="input__title" for="user_fullname">
                                Имя и фамилия:
                            </label>
                            <input class="input<?= $query['data']['fullname'] ? ' _error' : null ?>" type="text" value="<?= $_SESSION['user']['name'] . " " . $_SESSION['user']['surname'] ?>" id="user_fullname" placeholder="Сергей Иванов" name="user_fullname">
                            <? if ($query['data']['fullname']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['fullname'] ?>
                                </div>
                            <? endif; ?>
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="user_telephone">
                                Номер телефона:
                            </label>
                            <input class="input input-tel<?= $query['data']['telephone'] ? ' _error' : null ?>" type="tel" value="<?= $_SESSION['user']['telephone'] ?>" id="user_telephone" placeholder="+1(ххх)ххх-хх-хх" name="user_telephone">
                            <? if ($query['data']['telephone']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['telephone'] ?>
                                </div>
                            <? endif; ?>
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="user_email">
                                E-mail:
                            </label>
                            <input class="input<?= $query['data']['email'] ? ' _error' : null ?>" type="email" value="<?= $_SESSION['user']['email'] ?>" id="user_email" placeholder="info@trucklink.com" name="user_email">
                            <? if ($query['data']['email']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['email'] ?>
                                </div>
                            <? endif; ?>
                        </div>
                        <button class="applicaton-create__form_create button" name="button_create">
                            Отправить
                        </button>
                    </form>
                </div>
            </div>
        </main>
        <? require_once __DIR__ . './../../components/footer.php'; ?>
    </div>
    <? require_once __DIR__ . './../../components/script.php'; ?>
    <script src="/view/static/js/application.js" defer></script>
</body>

</html>