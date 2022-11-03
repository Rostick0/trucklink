<?

$user_id = (int) $_GET['id'];

$user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

if (!$user) {
    header('Location: ./');
}

$application_sql = "WHERE `is_deleted` = 0 AND `user_id` = '$user_id' ORDER BY `application_id` DESC LIMIT 10";

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
        'name' => '5000'
    ],
    [
        'id' => 6,
        'name' => '10000'
    ],
    [
        'id' => 6,
        'name' => '15000'
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

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
                            Admin
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

                    <div class="tabless">
                        <div class="filterss aniEl">
                            <div class="status">
                                <div class="select__content status__inner">
                                    <div class="select">
                                        <div class="select__content">
                                            <div class="select-block">
                                                <input class="select__input select__input_filter" placeholder="Status" type="text" readonly>
                                                <div class="select-icon">
                                                    <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <ul class="select__options">
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
                                </div>
                            </div>
                            <div class="city__from">
                                <div class="city__inner">
                                    <div class="cit_from">
                                        <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.25 8.25L16.5 1.5L9.75 15.75L8.25 9.75L2.25 8.25Z" stroke="#6E7B8B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <input class="input__city _city addres-search _from_text" placeholder="Sending city" type="text">
                                        <input class="input-block__input addres-search _from" type="text" name="from" hidden>
                                    </div>
                                    <span>&#8594;</span>
                                    <div class="cit_to">
                                        <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.25 8.25L16.5 1.5L9.75 15.75L8.25 9.75L2.25 8.25Z" stroke="#6E7B8B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <input class="input__city1 addres-search _to_text _city" placeholder="Delivery city" type="text">
                                        <input class="addres-search _to" type="text" name="to" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="select__dates">
                                <div class="dates__inner">
                                    <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9736 3.75C15.9736 3.33579 15.6378 3 15.2236 3C14.8094 3 14.4736 3.33579 14.4736 3.75V4.4501H9.52832V3.75C9.52832 3.33579 9.19253 3 8.77832 3C8.36411 3 8.02832 3.33579 8.02832 3.75V4.4501H6.36133C5.13352 4.4501 4 5.36273 4 6.65024V9.55058V16.8012C4 18.0887 5.13352 19.0013 6.36133 19.0013H17.6406C18.8684 19.0013 20.002 18.0887 20.002 16.8012V9.55058V6.65024C20.002 5.36273 18.8684 4.4501 17.6406 4.4501H15.9736V3.75ZM18.502 8.80058V6.65024C18.502 6.33596 18.1927 5.9501 17.6406 5.9501H15.9736V6.65027C15.9736 7.06449 15.6378 7.40027 15.2236 7.40027C14.8094 7.40027 14.4736 7.06449 14.4736 6.65027V5.9501H9.52832V6.65027C9.52832 7.06449 9.19253 7.40027 8.77832 7.40027C8.36411 7.40027 8.02832 7.06449 8.02832 6.65027V5.9501H6.36133C5.80932 5.9501 5.5 6.33596 5.5 6.65024V8.80058H18.502ZM5.5 10.3006H18.502V16.8012C18.502 17.1155 18.1927 17.5013 17.6406 17.5013H6.36133C5.80932 17.5013 5.5 17.1155 5.5 16.8012V10.3006Z" fill="white" />
                                    </svg>
                                    <div class="calendar-form">
                                        <div class="calendar-from__active">
                                            <input class="input input_dates" type="text" placeholder="6 october 2022" name="date" value="<?= $date ?>" readonly>
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
                                                    mn
                                                </li>
                                                <li class="calendar__weekday_item">
                                                    ts
                                                </li>
                                                <li class="calendar__weekday_item">
                                                    wd
                                                </li>
                                                <li class="calendar__weekday_item">
                                                    th
                                                </li>
                                                <li class="calendar__weekday_item">
                                                    fr
                                                </li>
                                                <li class="calendar__weekday_item">
                                                   st
                                                </li>
                                                <li class="calendar__weekday_item">
                                                    sn
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
                            <div class="select__cars">
                                <div class="select">
                                    <div class="select__content">
                                        <div class="select-block">
                                            <input class="select__input select__input_filter" type="text" placeholder="Car body type" readonly>
                                            <div class="select-icon">
                                                <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                                </svg>
                                            </div>
                                        </div>
                                        <ul class="select__options">
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
                            </div>
                            <div class="payments_filter">
                                <div class="select">
                                    <div class="select__content">
                                        <div class="select-block">
                                            <input class="select__input select__input_filter _price" type="text" placeholder="Status" readonly>
                                            <div class="select-icon">
                                                <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.742422 0.276188C0.374922 0.632552 0.374922 1.2071 0.742422 1.56346L6.97492 7.6071C7.26742 7.89073 7.73992 7.89073 8.03242 7.6071L14.2649 1.56346C14.6324 1.2071 14.6324 0.632551 14.2649 0.276187C13.8974 -0.0801763 13.3049 -0.0801762 12.9374 0.276187L7.49992 5.54164L2.06242 0.268916C1.70242 -0.0801745 1.10242 -0.0801757 0.742422 0.276188Z" fill="#6E7B8B" />
                                                </svg>
                                            </div>
                                        </div>
                                        <ul class="select__options">
                                            <? foreach ($price_select as $value) : ?>
                                                <? foreach ($price_select as $value) : ?>
                                                    <li class="select__option">
                                                        <label for="<?= "price_" . $value['id'] ?>">
                                                            <?= $value['name'] ?>
                                                        </label>
                                                        <input type="radio" name="price" id="<?= "price_" . $value['id'] ?>" value="<?= $value['id'] ?>" hidden>
                                                    </li>
                                                <? endforeach ?>
                                            <? endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="searches_filter">
                                <input type="text" class='input_payment' placeholder="All filters">
                            </div>
                            <button class="button__filter button">
                                <div class="button_fil_inner">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.4998 10.0837C17.4998 14.4587 13.9582 18.0003 9.58317 18.0003C5.20817 18.0003 1.6665 14.4587 1.6665 10.0837C1.6665 5.70866 5.20817 2.16699 9.58317 2.16699" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.3332 18.8337L16.6665 17.167" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M12.0833 5.60824C11.7916 4.69157 12.1333 3.5499 13.0999 3.24157C13.6083 3.0749 14.2333 3.21657 14.5916 3.70824C14.9249 3.1999 15.5749 3.08324 16.0749 3.24157C17.0416 3.5499 17.3833 4.69157 17.0916 5.60824C16.6333 7.06657 15.0333 7.8249 14.5916 7.8249C14.1416 7.8249 12.5583 7.08324 12.0833 5.60824Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>Apply</span>
                                </div>
                                </и>
                        </div>
                        <div class="orders_table"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <? require_once __DIR__ . './../../components/script.php'; ?>
</body>

</html>