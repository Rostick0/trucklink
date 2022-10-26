<?

$user_id = (int) $_GET['id'];

$user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

if (!$user) {
    header('Location: ./');
}

$application_sql = "WHERE `is_deleted` = 0 AND `user_id` = '$user_id' ORDER BY `application_id` ASC LIMIT 10";

$applications = Application::get($application_sql);

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
                        <a class="personal-applications_create button" href="/pages/">
                            <svg width="1.56rem" height="1.5rem " viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 22C18.0228 22 22.5 17.5228 22.5 12C22.5 6.47715 18.0228 2 12.5 2C6.97715 2 2.5 6.47715 2.5 12C2.5 17.5228 6.97715 22 12.5 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.5 8V16" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.5 12H16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>
                                Add cargo
                            </span>
                        </a>
                    </div>
                    <div class="application__filter">
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
                    </div>
                    <table class="application__table">
                        <tbody>
                            <? foreach ($applications as $application) : ?>
                                <tr class="application__item">
                                    <td>
                                        <div class="application__route">
                                            <div class="application__status"></div>
                                            <div class="application__way">
                                                <div class="application__from">
                                                    <img src="./view/static/img/flag.png" alt=""> <?= $application['from'] ?>
                                                </div>
                                                <span class="applicaton__arrow">
                                                    →
                                                </span>
                                                <div class="application__to">
                                                    <img src="./view/static/img/flag.png" alt=""> <?= $application['to'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__date">
                                            <?= NormalizeView::date($application['date']) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__transport">
                                            <?= $application['transport_type'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__payment">
                                            <?= $application['price'] ? '$' . NormalizeView::price($application['price']) : 'Запрос цены' ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__flex">
                                            <div class="application__chat">
                                                <!-- <div class="application__chat_count">
                                                0
                                            </div> -->
                                                <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__flex">
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__flex">
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="application__flex">
                                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.4002 17.4201H10.8902C9.25016 17.4201 7.92016 16.0401 7.92016 14.3401C7.92016 13.9301 8.26016 13.5901 8.67016 13.5901C9.08016 13.5901 9.42016 13.9301 9.42016 14.3401C9.42016 15.2101 10.0802 15.9201 10.8902 15.9201H13.4002C14.0502 15.9201 14.5902 15.3401 14.5902 14.6401C14.5902 13.7701 14.2802 13.6001 13.7702 13.4201L9.74016 12.0001C8.96016 11.7301 7.91016 11.1501 7.91016 9.36008C7.91016 7.82008 9.12016 6.58008 10.6002 6.58008H13.1102C14.7502 6.58008 16.0802 7.96008 16.0802 9.66008C16.0802 10.0701 15.7402 10.4101 15.3302 10.4101C14.9202 10.4101 14.5802 10.0701 14.5802 9.66008C14.5802 8.79008 13.9202 8.08008 13.1102 8.08008H10.6002C9.95016 8.08008 9.41016 8.66008 9.41016 9.36008C9.41016 10.2301 9.72016 10.4001 10.2302 10.5801L14.2602 12.0001C15.0402 12.2701 16.0902 12.8501 16.0902 14.6401C16.0802 16.1701 14.8802 17.4201 13.4002 17.4201Z" fill="white" />
                                                <path d="M12 18.75C11.59 18.75 11.25 18.41 11.25 18V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V18C12.75 18.41 12.41 18.75 12 18.75Z" fill="white" />
                                                <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="white" />
                                            </svg>
                                            <span>
                                                Pay order
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/application_edit?id=<?= $application['application_id'] ?>">
                                            <svg width="1.19rem" height="1.19rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.38582 15.4531C3.90291 15.4531 3.45166 15.2869 3.12707 14.9781C2.71541 14.5902 2.51749 14.0044 2.58874 13.3711L2.88166 10.8061C2.93707 10.3231 3.22999 9.6819 3.57041 9.33356L10.07 2.45398C11.6929 0.736065 13.3871 0.688565 15.105 2.31148C16.8229 3.9344 16.8704 5.62856 15.2475 7.34648L8.74791 14.2261C8.41541 14.5823 7.79791 14.9148 7.31499 14.994L4.76582 15.4294C4.63124 15.4373 4.51249 15.4531 4.38582 15.4531ZM12.6112 2.30357C12.0017 2.30357 11.4712 2.68357 10.9329 3.25357L4.43332 10.1411C4.27499 10.3073 4.09291 10.7031 4.06124 10.9327L3.76832 13.4977C3.73666 13.759 3.79999 13.9727 3.94249 14.1073C4.08499 14.2419 4.29874 14.2894 4.55999 14.2498L7.10916 13.8144C7.33874 13.7748 7.71874 13.569 7.87707 13.4027L14.3767 6.52315C15.3583 5.47815 15.7146 4.51232 14.2817 3.16648C13.6483 2.5569 13.1021 2.30357 12.6112 2.30357Z" fill="white" />
                                                <path d="M13.7275 8.66932C13.7117 8.66932 13.6879 8.66932 13.6721 8.66932C11.2021 8.42391 9.21502 6.54766 8.83502 4.09349C8.78752 3.76891 9.00919 3.46807 9.33377 3.41266C9.65835 3.36516 9.95919 3.58682 10.0146 3.91141C10.3154 5.82724 11.8671 7.29974 13.7988 7.48974C14.1234 7.52141 14.3609 7.81432 14.3292 8.13891C14.2896 8.43974 14.0284 8.66932 13.7275 8.66932Z" fill="white" />
                                                <path d="M16.625 18.0098H2.375C2.05042 18.0098 1.78125 17.7406 1.78125 17.416C1.78125 17.0914 2.05042 16.8223 2.375 16.8223H16.625C16.9496 16.8223 17.2188 17.0914 17.2188 17.416C17.2188 17.7406 16.9496 18.0098 16.625 18.0098Z" fill="white" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="#DA4242" />
                                            <path d="M9.16986 15.5804C8.97986 15.5804 8.78986 15.5104 8.63986 15.3604C8.34986 15.0704 8.34986 14.5904 8.63986 14.3004L14.2999 8.64035C14.5899 8.35035 15.0699 8.35035 15.3599 8.64035C15.6499 8.93035 15.6499 9.41035 15.3599 9.70035L9.69986 15.3604C9.55986 15.5104 9.35986 15.5804 9.16986 15.5804Z" fill="#DA4242" />
                                            <path d="M14.8299 15.5804C14.6399 15.5804 14.4499 15.5104 14.2999 15.3604L8.63986 9.70035C8.34986 9.41035 8.34986 8.93035 8.63986 8.64035C8.92986 8.35035 9.40986 8.35035 9.69986 8.64035L15.3599 14.3004C15.6499 14.5904 15.6499 15.0704 15.3599 15.3604C15.2099 15.5104 15.0199 15.5804 14.8299 15.5804Z" fill="#DA4242" />
                                        </svg>

                                    </td>
                                </tr>
                            <? endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <? require_once __DIR__ . './../../components/script.php'; ?>
</body>

</html>