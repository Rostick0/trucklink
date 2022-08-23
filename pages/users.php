<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Список пользователен") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Список пользователей") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

            <div class="users block-default">
                <div class="users__top">
                    <div class="page-title">
                        Все пользователи
                    </div>
                    <div class="users__count">
                        <?= Model::count('user', '', '') ?>
                    </div>
                </div>
                <form class="user__search" method="POST">
                    <div class="search__input-form input-form">
                        <label class="label__for-input" for="organization_search">
                            Поиск по названию организации
                        </label>
                        <input class="search__input input" type="text" placeholder="Введеите пароль" id="organization_search" name="organization_search">
                    </div>
                    <button class="user__search_button button-dark" name="organization_button">
                        Поиск
                    </button>
                </form>

                <ul class="users__list">
                    <? 
                    $users = User::getAll(10);
                    
                    if ($users) {
                        foreach  ($users as $user) {
                            echo '<li class="users__item">
                                    <div class="users__item_img">
                                        <img src="img/user_image.png" alt="">
                                    </div>
                                    <div class="users__text">
                                        <a class="users__name" href="">
                                            ' . $user['name'] . '
                                        </a>
                                        <div class="users__organization">
                                            ' . $user['organization'] . '
                                        </div>
                                        <a class="users__tel" href="tel:' . $user['telephone'] . '">
                                            ' . $user['telephone'] . '
                                        </a>
                                    </div>
                                    <div class="users__menu">
                                        <span></span>
                                    </div>
                                </li>';
                        }
                    } else {
                        echo '<li class="users__item">
                            <div class="users__name">Пользователи не найдены</div>
                            </li>';
                    }
                    
                    ?>
                </ul>

                <ul class="navigation-bottom">
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href _active" href="">
                            1
                        </a>
                    </li>
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href" href="">
                            2
                        </a>
                    </li>
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href" href="">
                            3
                        </a>
                    </li>
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href" href="">
                            4
                        </a>
                    </li>
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href" href="">
                            ...
                        </a>
                    </li>
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href" href="">
                            Следующая страница
                        </a>
                    </li>
                </ul>
                        </div>
                </div>
            </div>
        </main>
        <? require_once './source/components/script.php' ?>
    </div>
    <? require_once './source/components/script.php' ?>
</body>
</html>