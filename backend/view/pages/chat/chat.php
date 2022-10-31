<?

$application_id = (int) $_GET['application_id'];

$application = getDbDate('application', 'application_id', $application_id)->fetch_assoc();

$messages = getDbDate('message', 'application_id', $application_id);

$user_id = $application['user_id'];

if ($_SESSION['user']['user_id'] == $user_id) {
    die(require_once 'chat_broker.php');
}

$user = getDbDate('user', 'user_id', $user_id)->fetch_assoc();

if (!$user) {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <? require_once __DIR__ . './../../components/meta.php' ?>
    <? require_once __DIR__ . './../../components/style.php' ?>
    <title>Чат</title>
</head>

<body>
    <div class="wrapper chat">
        <? require_once __DIR__ . './../../components/header.php'; ?>
        <main class="main">
            <div class="container">
                <div class="chat__main_container">
                    <section class="user-info">
                        <? require_once __DIR__ . './../../components/profile_avatar.php'; ?>
                        <div class="user-info__user section-title">
                            <?= $user['name'] . " " . $user['surname'] ?>
                        </div>
                        <div class="user-info__greet">
                            ID <?= $application_id ?>
                        </div>
                    </section>
                    <div class="application__buttons">
                        <a class="application-info__link back-office__link link-color link" onclick="history.go(-1)">
                            <svg width="1.56rem" height="1.5rem" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.62988 19.2246H15.6299C18.891 19.2246 21.5449 16.5707 21.5449 13.3096C21.5449 10.0484 18.891 7.39457 15.6299 7.39457H4.62988C4.12876 7.39457 3.71488 7.80844 3.71488 8.30957C3.71488 8.8107 4.12876 9.22457 4.62988 9.22457H15.6299C17.8788 9.22457 19.7149 11.0607 19.7149 13.3096C19.7149 15.5584 17.8788 17.3946 15.6299 17.3946H7.62988C7.12876 17.3946 6.71488 17.8084 6.71488 18.3096C6.71488 18.8107 7.12876 19.2246 7.62988 19.2246Z" fill="white" stroke="white" stroke-width="0.33" />
                                <path d="M6.28339 11.4566C6.46596 11.6391 6.69866 11.7249 6.93006 11.7249C7.15705 11.7249 7.40265 11.6419 7.57873 11.4545C7.93117 11.0999 7.9305 10.517 7.57673 10.1632L5.6634 8.24988L7.57673 6.33656C7.93117 5.98212 7.93117 5.39765 7.57673 5.04321C7.22229 4.68877 6.63782 4.68877 6.28339 5.04321L3.72339 7.60321C3.36895 7.95765 3.36895 8.54212 3.72339 8.89656L6.28339 11.4566Z" fill="white" stroke="white" stroke-width="0.33" />
                            </svg>
                            <span>
                                Back to office
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
                    <section class="chat__block">
                        <div class="chat__block_top">
                            <? require_once __DIR__ . './../../components/chat_avatar.php'; ?>
                            <div class="chat__block_top_text">
                                <div class="chat__user-fullname">
                                    <?= $user['name'] . " " . $user['surname'] ?>
                                </div>
                                <div class="chat__user-status">
                                    <? if ($user['is_online']) : ?>
                                        <div class="_online">
                                            в сети
                                        </div>
                                    <? else : ?>
                                        <div class="_offline">
                                            не сети
                                        </div>
                                    <? endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="chat__content">
                            <div class="chat__messages">
                                <!-- <div class="chat__date">
                                    сегодня
                                </div> -->
                                <? foreach ($messages as $message) : ?>
                                    <div class="chat__message <?= $message['user_to'] === $user_id ? '_from-me' : '' ?>">
                                        <?= $message['text'] ?>
                                    </div>
                                <? endforeach ?>
                            </div>
                            <form class="chat__content_bottom" method="POST" onsubmit="return false;">
                                <textarea class="chat__textarea input _height-important"></textarea>
                                <button class="chat__send button">
                                    <svg width="1.625rem" height="1.625rem" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.66685 13.0007L5.99547 20.8803C5.95589 20.9851 5.94773 21.0989 5.97196 21.2081C5.9962 21.3173 6.05181 21.4173 6.13219 21.4964C6.21258 21.5754 6.31435 21.6301 6.42541 21.6539C6.53648 21.6777 6.65216 21.6697 6.75872 21.6308L21.125 14.084L21.348 13.9668L21.5711 13.8496L21.7941 13.7325C21.7941 13.7325 22.2083 13.5423 22.2083 13.0007C22.2083 12.459 21.7941 12.2688 21.7941 12.2688L21.5711 12.1517L21.348 12.0345L21.125 11.9173L6.75872 4.37052C6.65216 4.3316 6.53647 4.32358 6.42541 4.3474C6.31435 4.37123 6.21258 4.42592 6.13219 4.50495C6.05181 4.58398 5.9962 4.68405 5.97196 4.79325C5.94773 4.90245 5.95589 5.01619 5.99547 5.12097L8.66685 13.0007ZM8.66685 13.0007H14.0833" stroke="#FAFAFA" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </main>
        <? require_once __DIR__ . './../../components/footer.php'; ?>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
    <script>
        const userTo = <?= $application['user_id'] ? $application['user_id'] : 'null' ?>;
    </script>
    <? require_once __DIR__ . './../../components/script.php'; ?>
</body>

</html>