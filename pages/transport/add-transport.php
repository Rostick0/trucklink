<?

$citiesAll = City::getWithCountry();
$create_name = 'create_transport';

?>

<!DOCTYPE html>
<html lang="ru">

<?= rendeHead("Добавить транспорт") ?>

<body>
    <div class="wrapper">
        <?= renderHeader("Добавить транспорт") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                    <form class="information" method="POST">
                        <?= issetCreateTransport() ?>
                        <div class="page-title">
                            Добавить транспорт
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