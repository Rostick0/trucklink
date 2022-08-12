<?
$from = City::getWithCountryOne($cargo['from']);
$to = City::getWithCountryOne($cargo['to']);
$transport_upload = Model::get('transport_upload', 'transport_upload_id', $cargo['transport_upload_id']);
$upload_type = Model::get('upload_type', 'upload_type_id', $cargo['upload_type_id']);
$user = Model::get('user', 'user_id', $cargo['user_id']);
$user_activity = Model::get('user_activity', 'user_activity_id', $user['activity_id']);
$messengers = Model::getAll('user_messenger', 'user_id', $cargo['user_id']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require_once './source/components/style.php' ?>
    <title>Заявка на транспорт #<?= $cargo['application_id'] ?></title>
</head>
<body>
    <div class="wrapper">
        <?= renderHeader("Заявка на транспорт #{$cargo['application_id']}") ?>
        <main class="main">
            <div class="container">
                <div class="main__container">
                    <?= renderNavigationTop() ?>

                    <div class="transport">
                        <div class="transport__card block-default">
                            <div class="transport__top">
                                <div class="transport__page-title page-title">
                                    Заявка на транспорт #<?= $cargo['application_id'] ?>
                                </div>
                                <div class="transport__top_bottom">
                                    <div class="transport__id">
                                        (ID Заявки: <?= $cargo['application_id'] ?>)
                                    </div>
                                    <date class="transport__date">
                                        Добавлено: <?= $cargo['date_created'] ?>
                                    </date>
                                </div>
                            </div>
                            <div class="transport__from-where">
                                <div class="transport__from">
                                    <div class="trasport__small-title small-title">
                                        Откуда:
                                    </div>
                                    <div class="trasport__small-info small-info">
                                        <?= $from['country'] . ", " . $from['city'] ?>
                                    </div>
                                </div>
                                <div class="transport__where">
                                    <div class="trasport__small-title small-title">
                                        Куда:
                                    </div>
                                    <div class="trasport__small-info small-info">
                                        <?= $to['country'] . ", " . $to['city'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="transport__table">
                                <div class="transport__table_left">
                                    <div class="small-title">
                                        Дата загрузки:
                                    </div>
                                    <date class="small-info">
                                        <?= $cargo['date_start'] ?>
                                    </date>
                                    <div class="small-title">
                                        Любое направление:
                                    </div>
                                    <div class="small-info">
                                        <?
                                            if ($cargo['is_any_direction']) {
                                                echo 'Да';
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </div>
                                    <div class="small-title">
                                        Тип транспорта:
                                    </div>
                                    <div class="small-info">
                                        <?= $transport_upload['name'] ?>
                                    </div>
                                </div>
                                <div class="transport__table_rigth">
                                    <div class="transport__table_rigth_left">
                                        <div class="small-title">
                                            Загрузка:
                                        </div>
                                        <div class="small-info">
                                            <? if ($upload_type['name']) {
                                                echo $upload_type['name'];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                        <div class="small-title">
                                            Высота м:
                                        </div>
                                        <div class="small-info">
                                            <? if ($cargo['height']) {
                                                echo $cargo['height'];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                        <div class="small-title">
                                            Масса т:
                                        </div>
                                        <div class="small-info">
                                            <? if ($cargo['weight']) {
                                                echo $cargo['weight'];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="transport__table_rigth_rigth">
                                        <div class="small-title">
                                            Длина м:
                                        </div>
                                        <div class="small-info">
                                            <? if ($cargo['length']) {
                                                echo $cargo['length'];
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                        </div>
                                        <div class="small-title">
                                            Ширина м:
                                        </div>
                                        <div class="small-info">
                                            <? if ($cargo['width']) {
                                                echo $cargo['width'];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                        <div class="small-title">
                                            Объём м3:
                                        </div>
                                        <div class="small-info">
                                            <? if ($cargo['volume']) {
                                                echo $cargo['volume'];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="transport__description">
                                <div class="transport__description_middle-title middle-title">
                                    Описание
                                </div>
                                <div class="transport__description_text">
                                    <?= $cargo['description'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="transport__user user block-default">
                            <div class="user__top">
                                <div class="user__top_info">
                                    <div class="user__name">
                                        <?= $user['name'] ?> 
                                    </div>
                                    <div class="user__id">
                                        <?= $user['user_id'] ?> 
                                    </div>
                                </div>
                                <div class="user__activity">
                                    <?= $user_activity['name'] ?>
                                </div>
                            </div>
                            <div class="user__contacts">
                                <div class="user__middle-title middle-title">
                                    Контакты
                                </div>
                                <ul class="user__contast_list contacts__list">
                                    <?
                                        if ($user['telephone']) {
                                            echo '<li class="contact__item">
                                            <a class="button__telephone button-contact" href="tel:' . $user['telephone'] . '">
                                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.98293 9.28381L11.7481 8.19046C13.4102 7.16096 15.578 7.52412 16.8139 9.03908L18.7217 11.3778C19.7751 12.6691 19.8896 14.4877 19.0065 15.9009L17.4402 18.4076C17.4209 18.4385 17.4073 18.4728 17.4003 18.5087C17.3015 19.0136 17.9521 20.1176 19.4756 21.6411C21.1927 23.3583 22.3146 23.9192 22.6999 23.6823L25.2164 22.1098C26.6292 21.2269 28.4473 21.3411 29.7385 22.3938L32.0666 24.2917C33.578 25.5239 33.9445 27.6842 32.9239 29.3458L31.8344 31.1198C31.0648 32.3728 29.7305 33.1697 28.2624 33.2532C23.9669 33.4976 19.4434 31.1978 14.6812 26.4355C9.91424 21.6686 7.61457 17.1409 7.86419 12.8416C7.94897 11.3814 8.73948 10.054 9.98293 9.28381ZM10.9289 10.8111C10.1829 11.2732 9.70854 12.0696 9.65767 12.9458C9.44259 16.6502 11.5132 20.7269 15.9515 25.1652C20.3856 29.5993 24.4588 31.6702 28.1603 31.4596C29.0412 31.4095 29.8418 30.9314 30.3035 30.1796L31.3931 28.4056C31.9426 27.5109 31.7453 26.3476 30.9315 25.6842L28.6034 23.7862C27.9081 23.2194 26.9291 23.1579 26.1684 23.6333L23.6465 25.2091C22.2477 26.0697 20.4793 25.1855 18.2053 22.9114C16.2802 20.9864 15.3829 19.4637 15.6372 18.1638C15.6864 17.9126 15.7811 17.6725 15.9167 17.4555L17.483 14.9489C17.9585 14.188 17.8969 13.2087 17.3296 12.5134L15.4218 10.1747C14.7564 9.35892 13.589 9.16338 12.6941 9.71772L10.9289 10.8111Z" fill="white"/>
                                                </svg>
                                                <span>
                                                    ' . $user['telephone'] . '
                                                </span>                                        
                                            </a>
                                        </li>';
                                        }
                                    ?>
                                    <?
                                        foreach ($messengers as $messenger) {
                                            if ($messenger['name'] === 'viber') {
                                                echo '<li class="contact__item">
                                                        <a class="button__viber button-contact" href="tel:' . $messenger['telephone'] . '">
                                                            <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M26.4262 6.85139L26.4182 6.81917C25.7661 4.18287 22.8261 1.35409 20.1262 0.76559L20.0958 0.759299C15.7289 -0.0737376 11.3011 -0.0737376 6.93514 0.759299L6.90377 0.76559C4.20484 1.35409 1.26481 4.18306 0.61186 6.81917L0.604614 6.85139C-0.201538 10.5329 -0.201538 14.2666 0.604614 17.9482L0.61186 17.9804C1.23707 20.5041 3.95802 23.203 6.55714 23.9452V26.888C6.55714 27.9532 7.85512 28.4763 8.5932 27.7076L11.5748 24.6084C12.2216 24.6445 12.8686 24.6647 13.5154 24.6647C15.7136 24.6647 17.9128 24.4568 20.0957 24.0404L20.1262 24.0341C22.826 23.4456 25.766 20.6166 26.4181 17.9805L26.4261 17.9483C27.2322 14.2666 27.2322 10.5331 26.4262 6.85139ZM24.0665 17.4144C23.6311 19.1343 21.399 21.2725 19.6254 21.6676C17.3035 22.1092 14.9631 22.2978 12.6251 22.2331C12.5786 22.2318 12.5339 22.2499 12.5016 22.2833C12.1697 22.6238 10.3246 24.5181 10.3246 24.5181L8.00909 26.8946C7.83977 27.0712 7.54233 26.9509 7.54233 26.7074V21.8323C7.54233 21.7518 7.48484 21.6834 7.40571 21.6678C7.40523 21.6676 7.40485 21.6676 7.40438 21.6675C5.63077 21.2724 3.39936 19.1342 2.9632 17.4143C2.23761 14.0865 2.23761 10.713 2.9632 7.38527C3.39936 5.66533 5.63077 3.52716 7.40438 3.13209C11.4595 2.36083 15.5711 2.36083 19.6255 3.13209C21.3999 3.52716 23.6312 5.66533 24.0666 7.38527C24.793 10.7131 24.793 14.0866 24.0665 17.4144Z" fill="white"/>
                                                                <path d="M17.3734 19.6647C17.1007 19.5819 16.8409 19.5263 16.5995 19.4263C14.0987 18.3888 11.7973 17.0503 9.97445 14.9986C8.93777 13.8319 8.12638 12.5146 7.44054 11.1206C7.11526 10.4596 6.84117 9.7727 6.56174 9.09011C6.30701 8.46776 6.68224 7.82482 7.07731 7.35577C7.44807 6.91561 7.92522 6.57889 8.44194 6.33054C8.8452 6.13682 9.24294 6.24855 9.53752 6.59033C10.1742 7.32937 10.7591 8.10615 11.2326 8.96283C11.5238 9.48975 11.4439 10.1338 10.9161 10.4924C10.7877 10.5795 10.6709 10.6819 10.5514 10.7803C10.4465 10.8666 10.348 10.9537 10.2761 11.0705C10.1448 11.2841 10.1385 11.5363 10.223 11.7686C10.8738 13.5572 11.9709 14.9482 13.7713 15.6974C14.0594 15.8172 14.3486 15.9567 14.6806 15.9181C15.2364 15.8532 15.4164 15.2434 15.8059 14.9249C16.1866 14.6136 16.6732 14.6095 17.0832 14.869C17.4934 15.1287 17.891 15.4073 18.2862 15.689C18.6742 15.9655 19.0604 16.2357 19.4182 16.551C19.7624 16.8541 19.8809 17.2516 19.6871 17.6628C19.3324 18.4161 18.8162 19.0425 18.0717 19.4425C17.8615 19.5552 17.6104 19.5917 17.3734 19.6647C17.1007 19.5819 17.6104 19.5917 17.3734 19.6647Z" fill="white"/>
                                                                <path d="M13.5221 5.46931C16.7929 5.56102 19.4796 7.7317 20.0553 10.9655C20.1534 11.5165 20.1883 12.0797 20.2319 12.6391C20.2503 12.8743 20.1171 13.0977 19.8633 13.1009C19.6011 13.104 19.4832 12.8846 19.466 12.6496C19.4324 12.1841 19.409 11.7165 19.3449 11.2551C19.0063 8.81843 17.0634 6.80257 14.6381 6.37003C14.273 6.30492 13.8997 6.28786 13.5299 6.24905C13.2962 6.22455 12.9902 6.21044 12.9384 5.91986C12.8951 5.67628 13.1006 5.48237 13.3326 5.46988C13.3954 5.46617 13.4588 5.46912 13.5221 5.46931C16.7931 5.56102 13.4588 5.46912 13.5221 5.46931Z" fill="white"/>
                                                                <path d="M18.4929 11.9133C18.4875 11.9542 18.4847 12.0502 18.4607 12.1406C18.3739 12.469 17.8759 12.51 17.7614 12.1788C17.7274 12.0805 17.7223 11.9685 17.7221 11.8627C17.721 11.17 17.5705 10.4779 17.221 9.87509C16.8619 9.25551 16.3132 8.73488 15.6698 8.41961C15.2806 8.22913 14.8599 8.11063 14.4334 8.04018C14.247 8.00929 14.0586 7.9907 13.8713 7.96457C13.6443 7.93302 13.523 7.7884 13.5339 7.56474C13.5439 7.35519 13.6971 7.20428 13.9255 7.21734C14.6761 7.25986 15.4012 7.42231 16.0686 7.77562C17.4256 8.49435 18.2009 9.62864 18.4272 11.1434C18.4374 11.2122 18.4538 11.28 18.4591 11.3489C18.4718 11.5188 18.4799 11.6889 18.4929 11.9133C18.4875 11.9541 18.4799 11.6889 18.4929 11.9133Z" fill="white"/>
                                                                <path d="M16.4586 11.8339C16.185 11.8388 16.0385 11.6872 16.0102 11.4365C15.9907 11.2617 15.9751 11.0843 15.9333 10.9141C15.8511 10.5788 15.6729 10.2682 15.3909 10.0627C15.2579 9.96578 15.1069 9.89514 14.949 9.84938C14.7483 9.79132 14.5397 9.80733 14.3396 9.75833C14.1221 9.70504 14.0018 9.52886 14.036 9.32494C14.0671 9.13923 14.2477 8.99432 14.4507 9.00909C15.7188 9.10062 16.6251 9.75623 16.7545 11.2492C16.7638 11.3545 16.7744 11.4658 16.7511 11.5667C16.7109 11.739 16.5831 11.8255 16.4586 11.8339C16.1849 11.8387 16.5831 11.8255 16.4586 11.8339Z" fill="white"/>
                                                                <path d="M26.4263 6.85129L26.4183 6.81906C26.0528 5.34128 24.9681 3.80314 23.6099 2.63281L21.7739 4.25999C22.8657 5.12992 23.8011 6.33505 24.0669 7.38507C24.7933 10.7129 24.7933 14.0863 24.0669 17.4143C23.6315 19.1342 21.3992 21.2724 19.6257 21.6675C17.3038 22.1091 14.9634 22.2977 12.6254 22.233C12.5789 22.2317 12.5342 22.2498 12.5019 22.2831C12.17 22.6237 10.3249 24.518 10.3249 24.518L8.00943 26.8945C7.84011 27.0711 7.54267 26.951 7.54267 26.7073V21.8322C7.54267 21.7517 7.48518 21.6833 7.40605 21.6677C7.40558 21.6677 7.4052 21.6675 7.40472 21.6675C6.39674 21.443 5.24138 20.6552 4.35133 19.7016L2.53711 21.3092C3.67016 22.5418 5.13155 23.5382 6.55719 23.9453V26.8881C6.55719 27.9533 7.85518 28.4764 8.59326 27.7077L11.5749 24.6085C12.2216 24.6446 12.8685 24.6648 13.5155 24.6648C15.7136 24.6648 17.9128 24.4569 20.0958 24.0405L20.1262 24.0343C22.8261 23.4458 25.766 20.617 26.4181 17.9807L26.4261 17.9485C27.2324 14.2665 27.2324 10.533 26.4263 6.85129Z" fill="#D1D1D1"/>
                                                                <path d="M19.4182 16.5508C19.0604 16.2357 18.674 15.9653 18.2862 15.6888C17.8909 15.4071 17.4934 15.1285 17.0832 14.8688C16.6731 14.6093 16.1866 14.6134 15.8059 14.9247C15.4163 15.2432 15.2364 15.8529 14.6805 15.9179C14.3487 15.9565 14.0593 15.8169 13.7712 15.6972C12.6635 15.2363 11.823 14.5316 11.1878 13.6418L9.83789 14.8383C9.88375 14.8914 9.92751 14.9459 9.97412 14.9984C11.7971 17.0501 14.0986 18.3886 16.5991 19.4261C16.8404 19.5262 17.1004 19.5819 17.3731 19.6645C17.1004 19.5817 17.6103 19.5916 17.3731 19.6645C17.6103 19.5916 17.8612 19.5549 18.0716 19.4422C18.8162 19.0422 19.3323 18.4156 19.6869 17.6625C19.8809 17.2514 19.7623 16.8539 19.4182 16.5508Z" fill="#D1D1D1"/>
                                                                <path d="M18.2142 7.41528L17.6387 7.92542C18.5431 8.80536 19.1668 9.97159 19.3451 11.255C19.4091 11.7166 19.4327 12.184 19.4663 12.6495C19.4834 12.8846 19.6012 13.104 19.8636 13.101C20.1175 13.0978 20.2507 12.8744 20.2323 12.6392C20.1885 12.0799 20.1537 11.5165 20.0556 10.9656C19.8036 9.55002 19.1471 8.33822 18.2142 7.41528Z" fill="#D1D1D1"/>
                                                                <path d="M18.427 11.1429C18.2621 10.0391 17.8042 9.13837 17.0436 8.45215L16.4697 8.96076C16.7665 9.22417 17.0232 9.53353 17.221 9.87474C17.5704 10.4775 17.7209 11.1697 17.722 11.8624C17.7222 11.9682 17.7273 12.0801 17.7613 12.1786C17.876 12.5101 18.3739 12.469 18.4606 12.1405C18.4846 12.0499 18.4874 11.9539 18.4928 11.9132C18.4874 11.9541 18.4797 11.6889 18.4928 11.9132C18.4797 11.6889 18.4717 11.5186 18.4588 11.3485C18.4537 11.2794 18.4372 11.2115 18.427 11.1429Z" fill="#D1D1D1"/>
                                                                <path d="M15.8811 9.48267L15.2969 10.0005C15.3291 10.0201 15.3607 10.0405 15.3913 10.0627C15.6733 10.2681 15.8514 10.5787 15.9336 10.914C15.9754 11.0843 15.9908 11.2614 16.0106 11.4365C16.0375 11.676 16.1736 11.8233 16.4239 11.8319C16.4421 11.8314 16.4601 11.8311 16.4714 11.831C16.5919 11.8176 16.7127 11.7331 16.7513 11.5665C16.7747 11.4657 16.764 11.3543 16.7547 11.2489C16.6821 10.4143 16.3665 9.8416 15.8811 9.48267Z" fill="#D1D1D1"/>
                                                            </svg>                                        
                                                            <span>
                                                                ' . $messenger['telephone'] . '
                                                            </span>                                        
                                                        </a>
                                                    </li>';
                                            }

                                            if ($messenger['name'] === 'telegram') {
                                                echo '<li class="contact__item">
                                                    <a class="button__telegram button-contact" href="tel:' . $messenger['telephone'] . '">
                                                        <svg width="27" height="23" viewBox="0 0 27 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.85611 9.90135C9.10385 6.65552 13.9368 4.51567 16.355 3.4818C23.2594 0.529891 24.6941 0.0171128 25.6292 0.000180536C25.8349 -0.00354352 26.2947 0.0488489 26.5926 0.297298C26.8441 0.507084 26.9133 0.790474 26.9464 0.989374C26.9795 1.18827 27.0208 1.64137 26.988 1.99541C26.6138 6.03635 24.9949 15.8426 24.1713 20.3686C23.8228 22.2836 23.1365 22.9258 22.4722 22.9886C21.0284 23.1252 19.9321 22.0078 18.5337 21.0656C16.3455 19.5912 15.1094 18.6734 12.9854 17.2347C10.5307 15.572 12.122 14.6581 13.5209 13.1646C13.887 12.7738 20.2483 6.82622 20.3714 6.28669C20.3868 6.21921 20.4011 5.96768 20.2557 5.83487C20.1103 5.70205 19.8958 5.74747 19.7409 5.78359C19.5215 5.83479 16.0259 8.20974 9.25407 12.9084C8.26184 13.6088 7.36312 13.95 6.55789 13.9321C5.6702 13.9124 3.96262 13.4162 2.69322 12.9921C1.13624 12.4718 -0.101214 12.1968 0.006541 11.3133C0.0626662 10.8531 0.679189 10.3824 1.85611 9.90135Z" fill="white"/>
                                                        </svg>                                        
                                                        <span>
                                                            ' . $messenger['telephone'] . '
                                                        </span>                                        
                                                    </a>
                                                </li>';
                                            }

                                            if ($messenger['name'] === 'whatsapp') {
                                                echo '<li class="contact__item">
                                                    <a class="button__whatsapp button-contact" href="tel:' . $messenger['telephone'] . '">
                                                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 27.4803L1.92248 20.6523C0.686212 18.552 0.0353093 16.1624 0.0353093 13.7076C0.0353093 6.14921 6.18452 0 13.7429 0C21.3013 0 27.4505 6.14921 27.4505 13.7076C27.4505 21.266 21.3013 27.4153 13.7429 27.4153C11.3878 27.4153 9.08163 26.8124 7.04151 25.6677L0 27.4803ZM7.4015 23.1739L7.82108 23.4301C9.59982 24.516 11.6476 25.09 13.7429 25.09C20.0192 25.09 25.1252 19.9839 25.1252 13.7076C25.1252 7.43138 20.0192 2.32527 13.7429 2.32527C7.46669 2.32527 2.36058 7.43138 2.36058 13.7076C2.36058 15.8945 2.98211 18.0182 4.15784 19.849L4.4404 20.289L3.33331 24.2211L7.4015 23.1739Z" fill="white"/>
                                                            <path d="M9.89276 7.32769L9.00331 7.2792C8.72393 7.26396 8.44989 7.35731 8.23872 7.54075C7.80752 7.9152 7.11803 8.63914 6.90626 9.58251C6.59045 10.9891 7.0785 12.7115 8.34164 14.434C9.60478 16.1564 11.9587 18.9123 16.1212 20.0893C17.4625 20.4685 18.5177 20.2129 19.3318 19.6921C19.9766 19.2796 20.4211 18.6176 20.5812 17.8692L20.7233 17.2059C20.7684 16.9951 20.6613 16.7812 20.4655 16.6909L17.4594 15.3053C17.2643 15.2154 17.0329 15.2723 16.9016 15.4424L15.7215 16.9722C15.6324 17.0878 15.4798 17.1336 15.342 17.0852C14.5338 16.8012 11.8267 15.6674 10.3413 12.8061C10.2769 12.682 10.2929 12.5314 10.3843 12.4255L11.5121 11.1208C11.6273 10.9876 11.6564 10.8003 11.5872 10.6384L10.2914 7.6068C10.2224 7.44541 10.0678 7.33724 9.89276 7.32769Z" fill="white"/>
                                                        </svg>                                        
                                                        <span>
                                                        ' . $messenger['telephone'] . '
                                                        </span>                                        
                                                    </a>
                                                </li>';
                                            }
                                        }
                                    ?>
                                    
                                    <li class="contact__item">
                                        <a class="button__site button-contact" href="tel:+79494456545">
                                            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.25 6.74991H6.75C6.39196 6.74991 6.04858 6.89214 5.79541 7.14531C5.54223 7.39848 5.4 7.74185 5.4 8.09989C5.4 8.45792 5.54223 8.8013 5.79541 9.05447C6.04858 9.30764 6.39196 9.44987 6.75 9.44987H20.25C20.608 9.44987 20.9514 9.30764 21.2046 9.05447C21.4578 8.8013 21.6 8.45792 21.6 8.09989C21.6 7.74185 21.4578 7.39848 21.2046 7.14531C20.9514 6.89214 20.608 6.74991 20.25 6.74991ZM20.25 12.1498H6.75C6.39196 12.1498 6.04858 12.2921 5.79541 12.5452C5.54223 12.7984 5.4 13.1418 5.4 13.4998C5.4 13.8578 5.54223 14.2012 5.79541 14.4544C6.04858 14.7076 6.39196 14.8498 6.75 14.8498H20.25C20.608 14.8498 20.9514 14.7076 21.2046 14.4544C21.4578 14.2012 21.6 13.8578 21.6 13.4998C21.6 13.1418 21.4578 12.7984 21.2046 12.5452C20.9514 12.2921 20.608 12.1498 20.25 12.1498ZM22.95 0H4.05C2.97587 0 1.94574 0.426689 1.18622 1.1862C0.426695 1.94571 0 2.97583 0 4.04994V17.5498C0 18.6239 0.426695 19.654 1.18622 20.4135C1.94574 21.173 2.97587 21.5997 4.05 21.5997H19.6965L24.6915 26.6081C24.8176 26.7332 24.9672 26.8322 25.1317 26.8994C25.2962 26.9666 25.4723 27.0007 25.65 26.9996C25.8271 27.0042 26.0028 26.9672 26.163 26.8916C26.4095 26.7903 26.6206 26.6184 26.7695 26.3973C26.9185 26.1763 26.9987 25.9162 27 25.6496V4.04994C27 2.97583 26.5733 1.94571 25.8138 1.1862C25.0543 0.426689 24.0241 0 22.95 0ZM24.3 22.3962L21.2085 19.2912C21.0824 19.1661 20.9328 19.0671 20.7683 18.9999C20.6038 18.9328 20.4277 18.8987 20.25 18.8997H4.05C3.69196 18.8997 3.34858 18.7575 3.09541 18.5043C2.84223 18.2512 2.7 17.9078 2.7 17.5498V4.04994C2.7 3.69191 2.84223 3.34853 3.09541 3.09536C3.34858 2.84219 3.69196 2.69996 4.05 2.69996H22.95C23.308 2.69996 23.6514 2.84219 23.9046 3.09536C24.1578 3.34853 24.3 3.69191 24.3 4.04994V22.3962Z" fill="white"/>
                                            </svg>                                        
                                            <span>
                                                Написать на сайте
                                            </span>                                        
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?= renderFooter() ?>
    </div>
    <? require_once './source/components/script.php' ?>
</body>
</html>