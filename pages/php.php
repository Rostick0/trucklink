<?

// function setd($array) {
//     global $mysqli;

//     foreach ($array as $value) {
//         echo $value . '<br/>';
//         $mysqli->query("INSERT INTO `transport_upload` (`transport_upload_id`, `name`) VALUES (NULL, '$value')");
//     }
// }

// setd($array)

var_dump(TransportUpload::get());
?>

<!-- <div class="information-basic__input-form input-form">
    <label class="label__for-input" for="type">
        Тип транспорта
    </label>
    <div class="_select">
        <div class="_select__block">
            <input type="text" class="_select__show input" id="type" placeholder="Выберите из списка" name="type" disabled>
            <svg class="_select__arrow" width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 1L6.49997 6L0.999999 1" stroke="#2A2929" stroke-width="2" stroke-linecap="round"/>
            </svg>                            
        </div>
        <ul class="_select__list">
            <div class="_select__item">
                <input class="_select__input input" type="text">
            </div>
            <?
            foreach (getData() as $value) {
                echo '
                    <li class="_select__item">
                    <label for="city_' . $value['city_id'] . '">
                        ' . $value['country'] . ', ' . $value['name'] . '
                        <input name="city" id="city_' . $value['city_id'] . '" hidden>
                    </label>
                    </li>
                ';
            }
            ?>
        </ul>
    </div>
</div> -->