"use strict";var personalAccountRightHtmls,blockPassowrd=document.querySelectorAll(".block__password"),select=(blockPassowrd&&blockPassowrd.forEach(function(n){var t=n.querySelector(".password-icon"),i=n.querySelector(".input");t.onclick=function(){n.classList.contains("_show-password")?(n.classList.remove("_show-password"),i.type="password"):(n.classList.add("_show-password"),i.type="text")}}),document.querySelectorAll(".select")),personalAccountNavigationItem=(select&&select.forEach(function(n){var t=n.querySelectorAll(".select__option"),i=n.querySelector(".select__input");t.forEach(function(n){n.onclick=function(){i.value=n.textContent.trim()}}),n.onclick=function(){n.classList.toggle("_active")}}),document.querySelectorAll(".personal-account__navigation_item")),personalAccountRight=document.querySelector(".personal-account__right");function removeClass(n,t){n.classList.contains(t)&&n.classList.remove(t)}personalAccountNavigationItem&&personalAccountRight&&(personalAccountRightHtmls=[{type:"my_applications",html:'<div class="personal-account__title section-title">\n            Заявки\n        </div>\n        <ul class="personal-account__application_list">\n            <li class="personal-account__application_item">\n                <div class="personal-account__application_item_top application__item">\n                    <div class="application__route">\n                        <div class="application__status"></div>\n                        <div class="application__way">\n                            <div class="application__from">\n                                <img src="../img/flag.png" alt=""> Нью-Йорк\n                            </div>\n                            <span class="applicaton__arrow">\n                                →\n                            </span>\n                            <div class="application__to">\n                                <img src="../img/flag.png" alt=""> Вашингтон-на-Бразосе\n                            </div>\n                        </div>\n                    </div>\n                    <div class="application__date">\n                        15 апр — 23 апр \n                    </div>\n                    <div class="application__transport">\n                        Специальная техника\n                    </div>\n                    <div class="application__payment">        \n                        $10 000\n                    </div>\n                </div>\n                <div class="personal-account__application_item_bottom">\n                    <a class="button-second" href="">\n                        Отследить груз\n                    </a>\n                    <a class="button-second" href="">\n                        Подробнее\n                    </a>\n                    <a class="button-second" href="">\n                        Редактировать\n                    </a>\n                </div>\n            </li>\n        </ul>'},{type:"about_me",html:'<div class="personal-account__title section-title">\n            Информация\n        </div>\n        <form class="personal-account__form">\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Имя\n                </label>\n                <input class="input" type="text" value="Константин" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Фамилия\n                </label>\n                <input class="input" type="text" value="Константинопольский" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n        </form>'}],personalAccountNavigationItem.forEach(function(t){t.onclick=function(){for(var n=0;n<personalAccountRightHtmls.length;n++)if(personalAccountRightHtmls[n].type===t.getAttribute("data-type")){personalAccountNavigationItem.forEach(function(n){return removeClass(n,"_active")}),t.classList.add("_active"),personalAccountRight.innerHTML=personalAccountRightHtmls[n].html;break}}}));