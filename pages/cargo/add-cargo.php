<?

$citiesAll = City::getWithCountry();

?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Добавить груз") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Добавить груз") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                    <form class="information" method="POST">
                        <div class="page-title">
                            Добавить груз
                        </div>
                        <?
                            require_once './source/components/UI/filter_create.php';
                        ?>
                    </form>
                </div>
            </div>
        </main>
            <? require_once './source/components/script.php' ?>
        </div>
        <? require_once './source/components/script.php' ?>
    </body>
</html>