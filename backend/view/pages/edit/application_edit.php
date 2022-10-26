<?

$application_id = (int) $_GET['id'];

$application = getDbDate('application', 'application_id', $application_id)->fetch_assoc();

$transport_type_db = getDbDate('transport_type');
$loading_method_db = getDbDate('loading_method');
$size_db = getDbDate('size');
$height_db = getDbDate('height');

$transport_type_fetch_all = $transport_type_db->fetch_all();
$loading_method_fetch_all = $loading_method_db->fetch_all();
$size_fetch_all = $size_db->fetch_all();
$height_fetch_all = $height_db->fetch_all();

// В функции поставлен индекс 0, т.к. fetch all не выдает id, а далет массив нумерованным, а 1 - название 

$application_transport_type = $transport_type_fetch_all[searchKeyArray($application['transport_type'], $transport_type_fetch_all, 0)][1];
$application_loading_method = $loading_method_fetch_all[searchKeyArray($application['loading_method'], $loading_method_fetch_all, 0)][1];
$application_size = $size_fetch_all[searchKeyArray($application['size'], $size_fetch_all, 0)][1];
$application_height = $height_fetch_all[searchKeyArray($application['height'], $height_fetch_all, 0)][1];

$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$date = $_REQUEST['date'];
$transport_type = $_REQUEST['transport_type'];
$loading_method = $_REQUEST['loading_method'];
$size = $_REQUEST['size'];
$height = $_REQUEST['height'];
$photo = $_FILES['photo'];
$mass = $_REQUEST['mass'];
$price = $_REQUEST['price'];
$comment = $_REQUEST['comment'];

$button_save = $_REQUEST['button_save'];

if (isset($button_save)) {
    $query = ApplicationController::edit($from, $to, $date, $transport_type, $loading_method, $size, $height, $photo, $mass, $price, $comment, $application_id, $application['date_created']);
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
    <div class="wrapper applicaton-create application-edit">
        <? require_once __DIR__ . './../../components/header.php'; ?>
        <main class="main">
            <div class="container">
                <div class="applicaton-create__main">
                    <div class="applicaton-create__top">
                        <div class="applicaton-create__title section-title">
                            EDIT CARGO
                        </div>
                    </div>
                    <div class="applicaton-create__subtitle section-subtitle">
                        ID <?= $application_id ?>
                    </div>
                    <form class="applicaton-create__form" method="POST" enctype="multipart/form-data">
                        <div class="input__block">
                            <label class="input__title" for="from">
                                Откуда:
                            </label>
                            <div class="input__block_style">
                                <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 8.25L16.5 1.5L9.75 15.75L8.25 9.75L2.25 8.25Z" stroke="#7F858E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input class="input addres-search _from_text<?= $query['data']['from'] ? ' _error' : null ?>" type="text" id="from" placeholder="Введите город отправки" value="<?= $application['from'] ?>">
                                <input class="input addres-search _from" type="text" name="from" hidden>
                            </div>
                            <? if ($query['data']['from']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['from'] ?>
                                </div>
                            <? endif; ?>
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="to">
                                Куда:
                            </label>
                            <div class="input__block_style">
                                <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 8.25L16.5 1.5L9.75 15.75L8.25 9.75L2.25 8.25Z" stroke="#7F858E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input class="input addres-search _to_text<?= $query['data']['to'] ? ' _error' : null ?>" type="text" id="to" placeholder="Введите город доставки" value="<?= $application['to'] ?>">
                                <input class="input addres-search _to" type="text" name="to" hidden>
                            </div>
                            <? if ($query['data']['to']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['to'] ?>
                                </div>
                            <? endif; ?>
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="date">
                                Дата загрузки:
                            </label>
                            <div class="input__block_style">
                                <svg width="1.75rem" height="1.75rem" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.661 4.37461C18.661 3.87755 18.258 3.47461 17.761 3.47461C17.2639 3.47461 16.861 3.87755 16.861 4.37461V5.16639H11.1414V4.37461C11.1414 3.87755 10.7385 3.47461 10.2414 3.47461C9.74437 3.47461 9.34143 3.87755 9.34143 4.37461V5.16639H7.42161C5.9779 5.16639 4.64172 6.23991 4.64172 7.75822V11.142V19.601C4.64172 21.1193 5.9779 22.1928 7.42161 22.1928H20.5808C22.0245 22.1928 23.3607 21.1193 23.3607 19.601V11.142V7.75822C23.3607 6.23991 22.0245 5.16639 20.5808 5.16639H18.661V4.37461ZM21.5607 10.242V7.75822C21.5607 7.40779 21.2136 6.96639 20.5808 6.96639H18.661V7.75826C18.661 8.25532 18.258 8.65826 17.761 8.65826C17.2639 8.65826 16.861 8.25532 16.861 7.75826V6.96639H11.1414V7.75826C11.1414 8.25532 10.7385 8.65826 10.2414 8.65826C9.74437 8.65826 9.34143 8.25532 9.34143 7.75826V6.96639H7.42161C6.78886 6.96639 6.44172 7.40779 6.44172 7.75822V10.242H21.5607ZM6.44172 12.042H21.5607V19.601C21.5607 19.9514 21.2136 20.3928 20.5808 20.3928H7.42161C6.78886 20.3928 6.44172 19.9514 6.44172 19.601V12.042Z" fill="#7F858E" />
                                </svg>
                                <div class="calendar-form">
                                    <div class="calendar-from__active">
                                        <input type="text" class="input" placeholder="Выберите дату" id="date" name="date" value="<?= DateView::normalizeDate($application['date'], true)?>" readonly>
                                    </div>
                                    <div class="calendar">
                                        <div class="calendar__month">
                                            <div class="calendar__arrow_left calendar__month_left">
                                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 12L2 6.49997L7 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                            <div class="calendar__month_text calendar__text"></div>
                                            <div class="calendar__arrow_right calendar__month_right">
                                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 12L6 6.49997L1 1" stroke="#2D2D41" stroke-width="2" stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <ul class="calendar__weekday">
                                            <li class="calendar__weekday_item">
                                                пн
                                            </li>
                                            <li class="calendar__weekday_item">
                                                вт
                                            </li>
                                            <li class="calendar__weekday_item">
                                                ср
                                            </li>
                                            <li class="calendar__weekday_item">
                                                чт
                                            </li>
                                            <li class="calendar__weekday_item">
                                                пт
                                            </li>
                                            <li class="calendar__weekday_item">
                                                сб
                                            </li>
                                            <li class="calendar__weekday_item">
                                                вс
                                            </li>
                                        </ul>
                                        <ul class="calendar__day">
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                            <li class="calendar__day_item"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="select">
                            <div class="select__title">
                                Тип транспорта:
                            </div>
                            <div class="select__content">
                                <div class="select-block">
                                    <input class="select__input" type="text" value="<?= $application_transport_type ?>" placeholder="Выберите метод загрузки">
                                    <div class="select-icon">
                                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                        </svg>
                                    </div>
                                </div>
                                <ul class="select__options">
                                    <? foreach ($transport_type_db as $value) : ?>
                                        <li class="select__option">
                                            <label for="<?= "transport_type_" . $value['transport_type_id'] ?>">
                                                <?= $value['name'] ?>
                                            </label>
                                            <input type="radio" name="transport_type" id="<?= "transport_type_" . $value['transport_type_id'] ?>" <?= $application['transport_type'] == $value['transport_type_id'] ? 'checked' : '' ?> value="<?= $value['transport_type_id'] ?>" hidden>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="select">
                            <div class="select__title">
                                Метод загрузки:
                            </div>
                            <div class="select__content">
                                <div class="select-block">
                                    <input class="select__input" type="text" value="<?= $application_loading_method ?>" placeholder="Выберите метод загрузки">
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
                                            <input type="radio" name="loading_method" id="<?= "loading_method_" . $value['loading_method_id'] ?>" <?= $application['loading_method'] == $value['loading_method_id'] ? 'checked' : '' ?> value="<?= $value['loading_method_id'] ?>" hidden>
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
                                    <input class="select__input" type="text" value="<?= $application_size ?>" placeholder="Выберите размер палета" readonly>
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
                                            <input type="radio" name="size" id="<?= "size_" . $value['size_id'] ?>" <?= $application['size'] == $value['size_id'] ? 'checked' : '' ?> value="<?= $value['size_id'] ?>" hidden>
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
                                    <input class="select__input" type="text" value="<?= $application_height ?>" placeholder="Выберите высоту груза" readonly>
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
                                            <input type="radio" name="height" id="<?= "height_" . $value['height_id'] ?>" <?= $application['height'] == $value['height_id'] ? 'checked' : '' ?> value="<?= $value['height_id'] ?>" hidden>
                                        </li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="mass">
                                Общая масса груза:
                            </label>
                            <input class="input" type="number" id="mass" placeholder="Введите массу груза" name="mass" value="<?= $application['mass'] ?>">
                        </div>
                        <div class="input__block">
                            <label class="input__title" for="amount">
                                Стоимость:
                            </label>
                            <input class="input" type="number" id="amount" placeholder="Введите стоимость" name="price" value="<?= $application['price'] ?>">
                        </div>
                        <div class="input__block input__block_comment">
                            <label class="input__title" for="comment">
                                Комментарий:
                            </label>
                            <input class="input" type="text" id="comment" placeholder="Введите ваш комментарий касательно груза" name="comment" value="<?= $application['comment'] ?>">
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
                                <? if ($application['photo']) : ?>
                                    <span class="input__block_file_content_text">
                                        <?= $application['photo'] ?>
                                    </span>
                                <? else : ?>
                                    <span class="input__block_file_content_text">
                                        Нажмите, чтобы добавить
                                    </span>
                                <? endif ?>
                            </div>
                            <? if ($query['data']['photo']) : ?>
                                <div class="_color-error">
                                    <?= $query['data']['photo'] ?>
                                </div>
                            <? endif; ?>
                            <input type="file" accept="<?= implode(',', $ALLOWED_IMAGE_TYPES) ?>" id="photo" name="photo" hidden>
                        </label>
                        <button class="applicaton-create__form_create button" name="button_save">
                            Save
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