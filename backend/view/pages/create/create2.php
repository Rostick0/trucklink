<?

$body_type_db = getDbDate('body_type');
$loading_method_db = getDbDate('loading_method');
$size_db = getDbDate('size');
$height_db = getDbDate('height');

$loading_method = $_REQUEST['loading_method'];
$size = $_REQUEST['size'];
$height = $_REQUEST['height'];
$photo = $_FILES['photo'];
$mass = $_REQUEST['mass'];
$price = $_REQUEST['price'];
$comment = $_REQUEST['comment'];

$button_create = $_REQUEST['button_create'];

if (isset($button_create)) {
    $query = ApplicationController::thirdCreate($loading_method,  $size, $height, $photo, $mass, $price, $comment);
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <? require_once __DIR__ . './../../components/meta.php' ?>
    <? require_once __DIR__ . './../../components/style.php' ?>
    <title>Дополнительная информация</title>
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
                            <a href="/create?page=1" class="applicaton-create__href link">
                                назад
                            </a>
                        </div>
                        <div class="applicaton-create__title section-title">
                            Добавить груз
                        </div>
                        <div class="applicaton-create__link">
                            <a href="/create?page=3" class="applicaton-create__href link">
                                пропустить
                            </a>
                            <div class="applicaton-create__arrow">
                                <svg width="1rem" height="0.69rem" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.8051 5.04502L11.1251 0.201097C10.9991 0.0766103 10.831 0.00790116 10.6565 0.00967715C10.4821 0.0114531 10.3153 0.0835732 10.1917 0.210599C10.0682 0.337626 9.99785 0.509464 9.99567 0.68933C9.99348 0.869197 10.0597 1.0428 10.1801 1.17297L13.6976 4.813H0.66756C0.576634 4.80726 0.48553 4.82076 0.399857 4.85269C0.314183 4.88462 0.235754 4.93429 0.169399 4.99865C0.103043 5.06301 0.0501646 5.14069 0.0140198 5.22692C-0.022125 5.31314 -0.0407715 5.40608 -0.0407715 5.50002C-0.0407715 5.59395 -0.022125 5.6869 0.0140198 5.77312C0.0501646 5.85935 0.103043 5.93703 0.169399 6.00139C0.235754 6.06575 0.314183 6.11542 0.399857 6.14735C0.48553 6.17928 0.576634 6.19278 0.66756 6.18704H13.7501L10.1826 9.82449C10.1147 9.8867 10.0598 9.96253 10.0214 10.0474C9.98291 10.1322 9.96163 10.2242 9.95885 10.3178C9.95606 10.4114 9.97182 10.5046 10.0052 10.5917C10.0385 10.6788 10.0887 10.7579 10.1528 10.8243C10.2168 10.8907 10.2933 10.9429 10.3776 10.9778C10.4619 11.0126 10.5522 11.0294 10.643 11.027C10.7338 11.0246 10.8231 11.0032 10.9056 10.964C10.988 10.9247 11.0619 10.8686 11.1226 10.7989L15.8026 6.01947C15.8647 5.95554 15.914 5.87959 15.9476 5.79599C15.9813 5.71238 15.9986 5.62276 15.9986 5.53224C15.9986 5.44173 15.9813 5.3521 15.9476 5.2685C15.914 5.18489 15.8647 5.10895 15.8026 5.04502H15.8051Z" fill="#9A9A9A" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="applicaton-create__subtitle section-subtitle">
                        Дополнительная информация
                    </div>
                    <form class="applicaton-create__form" method="POST" enctype="multipart/form-data">
                        <div class="select">
                            <div class="select__title">
                                Метод загрузки:
                            </div>
                            <div class="select__content">
                                <div class="select-block">
                                    <input class="select__input" type="text" placeholder="Выберите метод загрузки">
                                    <div class="select-icon">
                                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                        </svg>
                                    </div>
                                </div>
                                <ul class="select__options">
                                    <? foreach ($loading_method_db as $value) : ?>
                                        <li class="select__option">
                                            <label for="<?= "loading_method_" . $value['loading_method_id'] ?>">
                                                <?= $value['name'] ?>
                                            </label>
                                            <input type="radio" name="loading_method" id="<?= "loading_method_" . $value['loading_method_id'] ?>" value="<?= $value['loading_method_id'] ?>" hidden>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="select">
                            <div class="select__title">
                                Размер груза:
                            </div>
                            <div class="select__content">
                                <div class="select-block">
                                    <input class="select__input" type="text" placeholder="Выберите размер палета" readonly>
                                    <div class="select-icon">
                                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                        </svg>
                                    </div>
                                </div>
                                <ul class="select__options">
                                    <? foreach ($size_db as $value) : ?>
                                        <li class="select__option">
                                            <label for="<?= "size_" . $value['size_id'] ?>">
                                                <?= $value['name'] ?>
                                            </label>
                                            <input type="radio" name="size" id="<?= "size_" . $value['size_id'] ?>" value="<?= $value['size_id'] ?>" hidden>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="select">
                            <div class="select__title">
                                Высота груза:
                            </div>
                            <div class="select__content">
                                <div class="select-block">
                                    <input class="select__input" type="text" placeholder="Выберите высоту груза" readonly>
                                    <div class="select-icon">
                                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                        </svg>
                                    </div>
                                </div>
                                <ul class="select__options">
                                    <? foreach ($height_db as $value) : ?>
                                        <li class="select__option">
                                            <label for="<?= "height_" . $value['height_id'] ?>">
                                                <?= $value['name'] ?>
                                            </label>
                                            <input type="radio" name="height" id="<?= "height_" . $value['height_id'] ?>" value="<?= $value['height_id'] ?>" hidden>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <label class="input__block input__block_file" for="photo">
                            <div class="input__title">
                                Фото груза:
                            </div>
                            <div class="input__block_file_content input <?= $query['data']['photo'] ? ' _error' : null ?>">
                                <svg class="input__block_file_icon" width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.06 17.25C11.65 17.25 11.31 16.91 11.31 16.5V11.5C11.31 11.09 11.65 10.75 12.06 10.75C12.47 10.75 12.81 11.09 12.81 11.5V16.5C12.81 16.91 12.47 17.25 12.06 17.25Z" fill="#7F858E" />
                                    <path d="M14.5 14.75H9.5C9.09 14.75 8.75 14.41 8.75 14C8.75 13.59 9.09 13.25 9.5 13.25H14.5C14.91 13.25 15.25 13.59 15.25 14C15.25 14.41 14.91 14.75 14.5 14.75Z" fill="#7F858E" />
                                    <path d="M17 22.75H7C2.59 22.75 1.25 21.41 1.25 17V7C1.25 2.59 2.59 1.25 7 1.25H8.5C10.25 1.25 10.8 1.82 11.5 2.75L13 4.75C13.33 5.19 13.38 5.25 14 5.25H17C21.41 5.25 22.75 6.59 22.75 11V17C22.75 21.41 21.41 22.75 17 22.75ZM7 2.75C3.43 2.75 2.75 3.43 2.75 7V17C2.75 20.57 3.43 21.25 7 21.25H17C20.57 21.25 21.25 20.57 21.25 17V11C21.25 7.43 20.57 6.75 17 6.75H14C12.72 6.75 12.3 6.31 11.8 5.65L10.3 3.65C9.78 2.96 9.63 2.75 8.5 2.75H7V2.75Z" fill="#7F858E" />
                                </svg>
                                <span class="input__block_file_content_text">
                                    Нажмите, чтобы добавить
                                </span>
                            </div>
                            <? if ($query['data']['photo']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['photo'] ?>
                                </div>
                            <? endif; ?>
                            <input type="file" accept="<?= implode(',', $ALLOWED_IMAGE_TYPES) ?>" id="photo" name="photo" hidden>
                        </label>
                        <div class="input__block">
                            <label class="input__title" for="mass">
                                Общая масса груза:
                            </label>
                            <input class="input" type="number" id="mass" placeholder="Введите массу груза">
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="amount">
                                Стоимость:
                            </label>
                            <input class="input" type="number" id="amount" placeholder="Введите стоимость" name="price">
                        </div>
                        <div class="input__block input__block_comment">
                            <label class="input__title" for="comment">
                                Комментарий:
                            </label>
                            <input class="input" type="text" id="comment" placeholder="Введите ваш комментарий касательно груза" name="comment">
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
</body>

</html>