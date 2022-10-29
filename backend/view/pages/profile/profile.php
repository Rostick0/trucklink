<?

$user_id = (int) $_GET['id'];

$user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

if (!$user) {
    header('Location: ./');
}

$application_sql = "WHERE `is_deleted` = 0 AND `user_id` = '$user_id' ORDER BY `application_id` ASC LIMIT 10";

$applications = Application::get($application_sql);
$status_db = getDbDate('status');
$transport_type_db = getDbDate('transport_type');
$price_select = [
    [
        'id' => 1,
        'name' => '100'
    ],
    [
        'id' => 2,
        'name' => '500'
    ],
    [
        'id' => 3,
        'name' => '1000'
    ],
    [
        'id' => 4,
        'name' => '1500'
    ],
    [
        'id' => 5,
        'name' => '2000'
    ],
    [
        'id' => 6,
        'name' => '5000'
    ]
];

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <? require_once __DIR__ . './../../components/meta.php' ?>
    <? require_once __DIR__ . './../../components/style.php' ?>
    <title>Профиль</title>
</head>

<body>
    <div class="wrapper personal-applications">
        <? require_once __DIR__ . './../../components/header.php'; ?>
        <main class="main">
            <div class="container">
                <div class="personal-applications__main_container">
                    <section class="user-info">
                        <? require_once __DIR__ . './../../components/profile_avatar.php'; ?>
                        <div class="user-info__user section-title">
                            <?= $user['name'] . " " . $user['surname'] ?>
                        </div>
                        <div class="user-info__greet">
                            Hello!
                        </div>
                    </section>
                    <div class="personal-applications__buttons application__buttons">
                        <a class="personal-applications_profile button-outline" href="/profile_info?id=<?= $user_id ?>">
                            <svg width="1.5rem" height="1.375rem" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 18V16.3333C19 15.4493 18.6313 14.6014 17.9749 13.9763C17.3185 13.3512 16.4283 13 15.5 13H8.5C7.57174 13 6.6815 13.3512 6.02513 13.9763C5.36875 14.6014 5 15.4493 5 16.3333V18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.5 9C14.433 9 16 7.433 16 5.5C16 3.567 14.433 2 12.5 2C10.567 2 9 3.567 9 5.5C9 7.433 10.567 9 12.5 9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>
                                My profile
                            </span>
                        </a>
                        <a class="personal-applications_create button" href="/">
                            <svg width="1.56rem" height="1.5rem" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 22C18.0228 22 22.5 17.5228 22.5 12C22.5 6.47715 18.0228 2 12.5 2C6.97715 2 2.5 6.47715 2.5 12C2.5 17.5228 6.97715 22 12.5 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.5 8V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.5 12H16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>
                                Add cargo
                            </span>
                        </a>
                    </div>
                    <!-- <div class="application__filter">
                        <div class="application__filter_top">
                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4902 20.7604C15.3002 20.7604 15.1102 20.6904 14.9602 20.5404C14.6702 20.2504 14.6702 19.7704 14.9602 19.4804L19.9702 14.4704C20.2602 14.1804 20.7402 14.1804 21.0302 14.4704C21.3202 14.7604 21.3202 15.2404 21.0302 15.5304L16.0202 20.5404C15.8702 20.6804 15.6802 20.7604 15.4902 20.7604Z" fill="white" />
                                <path d="M20.5 15.7402H3.5C3.09 15.7402 2.75 15.4002 2.75 14.9902C2.75 14.5802 3.09 14.2402 3.5 14.2402H20.5C20.91 14.2402 21.25 14.5802 21.25 14.9902C21.25 15.4002 20.91 15.7402 20.5 15.7402Z" fill="white" />
                                <path d="M3.49994 9.76043C3.30994 9.76043 3.11994 9.69043 2.96994 9.54043C2.67994 9.25043 2.67994 8.77043 2.96994 8.48043L7.97994 3.47043C8.26994 3.18043 8.74994 3.18043 9.03994 3.47043C9.32994 3.76043 9.32994 4.24043 9.03994 4.53043L4.02994 9.54043C3.88994 9.68043 3.68994 9.76043 3.49994 9.76043Z" fill="white" />
                                <path d="M20.5 9.75977H3.5C3.09 9.75977 2.75 9.41977 2.75 9.00977C2.75 8.59977 3.09 8.25977 3.5 8.25977H20.5C20.91 8.25977 21.25 8.59977 21.25 9.00977C21.25 9.41977 20.91 9.75977 20.5 9.75977Z" fill="white" />
                            </svg>
                            <span>
                                Filter
                            </span>
                        </div>
                    </div> -->
                    <table class="application__table _filter-profile">
                        <tbody>
                            <tr class="application-filter filter">
                                <td>
                                    <div class="select application-filter_select">
                                        <div class="select__content application-filter_select__content">
                                            <div class="select-block application-filter_select-block">
                                                <input class="select__input application-filter_select__input" type="text" placeholder="Select status:" readonly>
                                                <div class="select-icon">
                                                    <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <ul class="select__options application-filter_select__options">
                                                <? foreach ($status_db as $value) : ?>
                                                    <li class="select__option application-filter_select__option">
                                                        <label for="<?= "status_" . $value['status_id'] ?>">
                                                            <?= $value['name'] ?>
                                                        </label>
                                                        <input type="radio" name="status" id="<?= "status_" . $value['status_id'] ?>" value="<?= $value['status_id'] ?>" hidden>
                                                    </li>
                                                <? endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <label class="application-filter_input__block" for="from">
                                        <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.25 8.25L16.5 1.5L9.75 15.75L8.25 9.75L2.25 8.25Z" stroke="#6E7B8B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <input class="application-filter_input _city addres-search _from_text" placeholder="Enter sending city" type="text" id="from">
                                        <input class="input-block__input addres-search _from" type="text" name="from" hidden>
                                    </label>
                                </td>
                                <td>
                                    <label class="application-filter_input__block" for="to">
                                        <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.25 8.25L16.5 1.5L9.75 15.75L8.25 9.75L2.25 8.25Z" stroke="#6E7B8B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <input class="addres-search _to_text application-filter_input _city" placeholder="Enter delivery city" type="text" id="to">
                                        <input class="addres-search _to" type="text" name="to" hidden>
                                    </label>
                                </td>
                                <td>
                                    <div class="input__block">
                                        <div class="input-block__content">
                                            <div class="calendar-form">
                                                <div class="calendar-from__active">
                                                    <input class="input application-filter_input input-block__input" type="text" placeholder="select date" name="date" value="<?= $date ?>" readonly>
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
                                </td>
                                <td>
                                    <div class="select application-filter_select">
                                        <div class="select__content application-filter_select__content">
                                            <div class="select-block application-filter_select-block">
                                                <input class="select__input application-filter_select__input" type="text" placeholder="Сhoose car body type:" readonly>
                                                <div class="select-icon">
                                                    <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <ul class="select__options application-filter_select__options">
                                                <? foreach ($transport_type_db as $value) : ?>
                                                    <li class="select__option application-filter_select__option">
                                                        <label for="<?= "transport_type_" . $value['transport_type_id'] ?>">
                                                            <?= $value['name'] ?>
                                                        </label>
                                                        <input type="radio" name="transport_type" id="<?= "transport_type_" . $value['transport_type_id'] ?>" value="<?= $value['transport_type_id'] ?>" hidden>
                                                    </li>
                                                <? endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td colspan=2>
                                    <div class="select application-filter_select">
                                        <div class="select__content application-filter_select__content">
                                            <div class="select-block application-filter_select-block">
                                                <input class="select__input application-filter_select__input _price" type="text" placeholder="Payment status:" readonly>
                                                <div class="select-icon">
                                                    <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <ul class="select__options application-filter_select__options">
                                                <? foreach ($price_select as $value) : ?>
                                                    <li class="select__option application-filter_select__option">
                                                        <label for="<?= "price_" . $value['id'] ?>">
                                                            <?= $value['name'] ?>
                                                        </label>
                                                        <input type="radio" name="price" id="<?= "price_" . $value['id'] ?>" value="<?= $value['id'] ?>" hidden>
                                                    </li>
                                                <? endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="filter__all">
                                        All filters
                                    </div>
                                </td>
                                <td colspan=2>
                                    <button class="button application-filter__button">
                                        <svg width="1.25rem" height="1.31rem" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5 10.0837C17.5 14.4587 13.9584 18.0003 9.58335 18.0003C5.20835 18.0003 1.66669 14.4587 1.66669 10.0837C1.66669 5.70866 5.20835 2.16699 9.58335 2.16699" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M18.3334 18.8337L16.6667 17.167" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12.0833 5.60824C11.7917 4.69157 12.1333 3.5499 13.1 3.24157C13.6083 3.0749 14.2333 3.21657 14.5917 3.70824C14.925 3.1999 15.575 3.08324 16.075 3.24157C17.0417 3.5499 17.3833 4.69157 17.0917 5.60824C16.6333 7.06657 15.0333 7.8249 14.5917 7.8249C14.1417 7.8249 12.5583 7.08324 12.0833 5.60824Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>
                                            Apply
                                        </span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <!-- <td colspan="11">
                                    Нет заявок
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <? require_once __DIR__ . './../../components/script.php'; ?>
</body>

</html>