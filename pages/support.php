<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php' ?>
    <title>Поддержка</title>
</head>
<body>
    <div class="wrapper">
        <?= renderHeader("Поддержка") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                    <form class="support" method="POST" enctype="multipart/form-data">
                        <div class="support__page-title page-title">
                            Остались вопросы? Напишите нам
                        </div>
                        <div class="support__top">
                            <div class="support__input-form input-form">
                                <label class="label__for-input" for="user_name">
                                    Ваше имя
                                </label>
                                <input class="input" type="text" id="user_name" placeholder="Введите имя">
                            </div>
                            <div class="support__input-form input-form">
                                <label class="label__for-input" for="user_email">
                                    Ваш Email
                                </label>
                                <input class="input" type="email" id="user_email" placeholder="Введите ваш почтовый ящик">
                            </div>
                            <div class="support__important">
                                Перед тем как отправить сообщение, загляните в раздел
                                <a class="blue-link" href="">
                                    F.A.Q
                                </a>
                                , тамнаходятся ответы на самые часто задавыемые вопросы
                            </div>
                        </div>
                        <div class="textarea-form">
                            <label class="laber__for-textarea" for="user_message">
                                Ваше сообщение
                            </label>
                            <textarea class="support__textarea textarea" id="user_message" placeholder="Начните вводить сообщение"></textarea>
                        </div>
                        <div class="support__bottom">
                            <div class="support__bottom_left">
                                <button class="support__button-submit button-yellow">
                                    Отправить
                                </button>
                                <span class="support__agreement">
                                    Нажимая на кнопку “Отправить”, вы даёте согласие
                                    на обработку персональных данных
                                </span>
                            </div>
                            <div class="support__bottom_rigth">
                                <label class="support__input-file input-file" for="file">
                                    <input type="file" id="file" hidden>
                                    <div class="button-dark input-file__button">
                                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 6.94C0.0110664 6.84813 0.0324364 6.75763 0.0637493 6.67V6.58C0.114836 6.47718 0.18298 6.38267 0.265625 6.3L6.64062 0.3C6.72846 0.222216 6.82888 0.158081 6.93812 0.11H7.03375C7.14168 0.0517412 7.26089 0.0143442 7.38437 0H13.8125C14.6579 0 15.4686 0.316071 16.0664 0.87868C16.6642 1.44129 17 2.20435 17 3V17C17 17.7956 16.6642 18.5587 16.0664 19.1213C15.4686 19.6839 14.6579 20 13.8125 20H3.1875C2.34212 20 1.53137 19.6839 0.933598 19.1213C0.335825 18.5587 0 17.7956 0 17V7C0 7 0 7 0 6.94ZM6.375 3.41L3.62313 6H5.3125C5.59429 6 5.86454 5.89464 6.0638 5.70711C6.26306 5.51957 6.375 5.26522 6.375 5V3.41ZM2.125 17C2.125 17.2652 2.23694 17.5196 2.4362 17.7071C2.63546 17.8946 2.90571 18 3.1875 18H13.8125C14.0943 18 14.3645 17.8946 14.5638 17.7071C14.7631 17.5196 14.875 17.2652 14.875 17V3C14.875 2.73478 14.7631 2.48043 14.5638 2.29289C14.3645 2.10536 14.0943 2 13.8125 2H8.5V5C8.5 5.79565 8.16418 6.55871 7.5664 7.12132C6.96863 7.68393 6.15788 8 5.3125 8H2.125V17Z" fill="white"/>
                                        </svg>                                    
                                        <span>
                                            Добавить файл
                                        </span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <modal class="modal">

            </modal>
        </main>
        <?= renderFooter("Поддержка") ?>
    </div>
    <? require_once './source/components/script.php' ?>
</body>
</html>