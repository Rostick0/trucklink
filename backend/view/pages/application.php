<?

$user_id = (int) $_GET['id'];

$user = $_SESSION['user'];

// $user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

// if (!$user) {
//     header('Location: ./');
// }

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <? require_once __DIR__ . './../components/meta.php' ?>
    <? require_once __DIR__ . './../components/style.php' ?>
    <title>Профиль</title>
</head>

<body>
    <div class="wrapper application-info">
        <? require_once __DIR__ . './../components/header.php'; ?>
        <main class="main application-info__main">
            <div class="container">
                <div class="personal-applications__main_container">
                    <section class="user-info">
                        <label class="user-info__image" for="user_avatar">
                            <? if (false) : ?>
                                <img src="./view/upload/" alt="<?= $user['name'] . " " . $user['surname'] ?>">
                            <? else : ?>
                                <img src="./view/static/img/no-avatar.png" alt="Нет фото">
                            <? endif ?>
                            <input type="file" id="user_avatar" hidden>
                        </label>
                        <div class="user-info__user section-title">
                            <?= $user['name'] . " " . $user['surname'] ?>
                        </div>
                        <div class="user-info__greet">
                            Hello!
                        </div>
                    </section>
                    <a href="" class="link-color">
                        <svg width="1.56rem" height="1.5rem" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.62988 19.2246H15.6299C18.891 19.2246 21.5449 16.5707 21.5449 13.3096C21.5449 10.0484 18.891 7.39457 15.6299 7.39457H4.62988C4.12876 7.39457 3.71488 7.80844 3.71488 8.30957C3.71488 8.8107 4.12876 9.22457 4.62988 9.22457H15.6299C17.8788 9.22457 19.7149 11.0607 19.7149 13.3096C19.7149 15.5584 17.8788 17.3946 15.6299 17.3946H7.62988C7.12876 17.3946 6.71488 17.8084 6.71488 18.3096C6.71488 18.8107 7.12876 19.2246 7.62988 19.2246Z" fill="white" stroke="white" stroke-width="0.33" />
                            <path d="M6.28339 11.4566C6.46596 11.6391 6.69866 11.7249 6.93006 11.7249C7.15705 11.7249 7.40265 11.6419 7.57873 11.4545C7.93117 11.0999 7.9305 10.517 7.57673 10.1632L5.6634 8.24988L7.57673 6.33656C7.93117 5.98212 7.93117 5.39765 7.57673 5.04321C7.22229 4.68877 6.63782 4.68877 6.28339 5.04321L3.72339 7.60321C3.36895 7.95765 3.36895 8.54212 3.72339 8.89656L6.28339 11.4566Z" fill="white" stroke="white" stroke-width="0.33" />
                        </svg>
                        <span>
                            Back to office
                        </span>
                    </a>
                    <div class="application-info__info">

                    </div>
                    <div class="application-info__interaction">
                        <div class="application-info__buttons application__buttons">
                            <a class="personal-applications_create button" href="/pages/">
                                <svg width="1.56rem" height="1.5rem" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 4H20.5C21.6 4 22.5 4.9 22.5 6V18C22.5 19.1 21.6 20 20.5 20H4.5C3.4 20 2.5 19.1 2.5 18V6C2.5 4.9 3.4 4 4.5 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M22.5 6L12.5 13L2.5 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <span>
                                    Write broker
                                </span>
                            </a>
                            <a class="personal-applications_profile button-outline" href="">
                                <svg width="1.56rem" height="1.5rem" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.8999 17.4201H11.3899C9.74991 17.4201 8.41991 16.0401 8.41991 14.3401C8.41991 13.9301 8.75991 13.5901 9.16991 13.5901C9.57991 13.5901 9.91991 13.9301 9.91991 14.3401C9.91991 15.2101 10.5799 15.9201 11.3899 15.9201H13.8999C14.5499 15.9201 15.0899 15.3401 15.0899 14.6401C15.0899 13.7701 14.7799 13.6001 14.2699 13.4201L10.2399 12.0001C9.45991 11.7301 8.40991 11.1501 8.40991 9.36008C8.40991 7.82008 9.61991 6.58008 11.0999 6.58008H13.6099C15.2499 6.58008 16.5799 7.96008 16.5799 9.66008C16.5799 10.0701 16.2399 10.4101 15.8299 10.4101C15.4199 10.4101 15.0799 10.0701 15.0799 9.66008C15.0799 8.79008 14.4199 8.08008 13.6099 8.08008H11.0999C10.4499 8.08008 9.90991 8.66008 9.90991 9.36008C9.90991 10.2301 10.2199 10.4001 10.7299 10.5801L14.7599 12.0001C15.5399 12.2701 16.5899 12.8501 16.5899 14.6401C16.5799 16.1701 15.3799 17.4201 13.8999 17.4201Z" fill="white" />
                                    <path d="M12.5 18.75C12.09 18.75 11.75 18.41 11.75 18V6C11.75 5.59 12.09 5.25 12.5 5.25C12.91 5.25 13.25 5.59 13.25 6V18C13.25 18.41 12.91 18.75 12.5 18.75Z" fill="white" />
                                    <path d="M12.5 22.75C6.57 22.75 1.75 17.93 1.75 12C1.75 6.07 6.57 1.25 12.5 1.25C18.43 1.25 23.25 6.07 23.25 12C23.25 17.93 18.43 22.75 12.5 22.75ZM12.5 2.75C7.4 2.75 3.25 6.9 3.25 12C3.25 17.1 7.4 21.25 12.5 21.25C17.6 21.25 21.75 17.1 21.75 12C21.75 6.9 17.6 2.75 12.5 2.75Z" fill="white" />
                                </svg>

                                <span>
                                    Pay order
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <? require_once __DIR__ . './../components/script.php'; ?>
</body>

</html>