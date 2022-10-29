"use strict";var _this=void 0;function _classCallCheck(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}function _defineProperties(t,e){for(var n=0;n<e.length;n++){var a=e[n];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}function _createClass(t,e,n){return e&&_defineProperties(t.prototype,e),n&&_defineProperties(t,n),Object.defineProperty(t,"prototype",{writable:!1}),t}function _defineProperty(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var personalAccountRightHtmls,BACKEND_URL_API="http://backend/api",params=new Proxy(new URLSearchParams(window.location.search),{get:function(t,e){return t.get(e)}}),blockPassowrd=document.querySelectorAll(".block__password"),select=(blockPassowrd&&blockPassowrd.forEach(function(t){var e=t.querySelector(".password-icon"),n=t.querySelector(".input");e.onclick=function(){t.classList.contains("_show-password")?(t.classList.remove("_show-password"),n.type="password"):(t.classList.add("_show-password"),n.type="text")}}),document.querySelectorAll(".select")),personalAccountNavigationItem=(select&&select.forEach(function(e){var t=e.querySelectorAll(".select__option"),n=e.querySelector(".select__input");t.forEach(function(t){t.onclick=function(){n.value=t.textContent.trim()}}),e.onclick=function(t){"LABEL"!==t.target.tagName&&e.classList.toggle("_active")}}),document.querySelectorAll(".personal-account__navigation_item")),personalAccountRight=document.querySelector(".personal-account__right");function removeClass(t,e){t.classList.contains(e)&&t.classList.remove(e)}personalAccountNavigationItem&&personalAccountRight&&(personalAccountRightHtmls=[{type:"my_applications",html:'<div class="personal-account__title section-title">\n            Заявки\n        </div>\n        <ul class="personal-account__application_list">\n            <li class="personal-account__application_item">\n                <div class="personal-account__application_item_top application__item">\n                    <div class="application__route">\n                        <div class="application__status"></div>\n                        <div class="application__way">\n                            <div class="application__from">\n                                <img src="../img/flag.png" alt=""> Нью-Йорк\n                            </div>\n                            <span class="applicaton__arrow">\n                                →\n                            </span>\n                            <div class="application__to">\n                                <img src="../img/flag.png" alt=""> Вашингтон-на-Бразосе\n                            </div>\n                        </div>\n                    </div>\n                    <div class="application__date">\n                        15 апр — 23 апр \n                    </div>\n                    <div class="application__transport">\n                        Специальная техника\n                    </div>\n                    <div class="application__payment">        \n                        $10 000\n                    </div>\n                </div>\n                <div class="personal-account__application_item_bottom">\n                    <a class="button-second" href="">\n                        Отследить груз\n                    </a>\n                    <a class="button-second" href="">\n                        Подробнее\n                    </a>\n                    <a class="button-second" href="">\n                        Редактировать\n                    </a>\n                </div>\n            </li>\n        </ul>'},{type:"about_me",html:'<div class="personal-account__title section-title">\n            Информация\n        </div>\n        <form class="personal-account__form">\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Имя\n                </label>\n                <input class="input" type="text" value="Константин" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Фамилия\n                </label>\n                <input class="input" type="text" value="Константинопольский" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n            <div class="input__block">\n                <label class="input__title" for="input">\n                    Текст\n                </label>\n                <input class="input" type="text" id="input">\n            </div>\n        </form>'}],personalAccountNavigationItem.forEach(function(e){e.onclick=function(){for(var t=0;t<personalAccountRightHtmls.length;t++)if(personalAccountRightHtmls[t].type===e.getAttribute("data-type")){personalAccountNavigationItem.forEach(function(t){return _this.removeClass(t,"_active")}),e.classList.add("_active"),personalAccountRight.innerHTML=personalAccountRightHtmls[t].html;break}}}));var arrowLeft,arrowRight,headerSliderList,countSliderItem,transformValue,incrementTransformValue,countSliderItemValue,slider=document.querySelector(".header__slider"),inputTel=(slider&&(arrowLeft=slider.querySelector(".header__slider_arrow"),arrowRight=slider.querySelector(".header__slider_arrow._right"),headerSliderList=slider.querySelector(".header__slider_list"),countSliderItem=slider.querySelectorAll(".header__slider_item").length,transformValue=0,countSliderItemValue=(countSliderItem-3)*(incrementTransformValue=33.3),window.screen.width<1024&&(countSliderItemValue=(countSliderItem-1)*(incrementTransformValue=100)),arrowLeft.onclick=function(){0<=transformValue||(transformValue+=incrementTransformValue,headerSliderList.style="--transformValue: ".concat(transformValue,"%"))},arrowRight.onclick=function(){countSliderItemValue<=-transformValue||(transformValue-=incrementTransformValue,headerSliderList.style="--transformValue: ".concat(transformValue,"%"))}),document.querySelectorAll(".input-tel"));function maskTell(t){var r;function e(t){t.keyCode&&(r=t.keyCode);this.selectionStart<2&&t.preventDefault();var e="+ _ (___)___-__-__",n=0,a=e.replace(/\D/g,""),l=this.value.replace(/\D/g,""),i=e.replace(/[_\d]/g,function(t){return n<l.length?l.charAt(n++)||a.charAt(n):t}),e=(-1!=(n=i.indexOf("_"))&&(n<5&&(n=2),i=i.slice(0,n)),e.substr(0,this.value.length).replace(/_+/g,function(t){return"\\d{1,"+t.length+"}"}).replace(/[+()]/g,"\\$&"));(!(e=new RegExp("^"+e+"$")).test(this.value)||this.value.length<3||47<r&&r<58)&&(this.value=i),"blur"==t.type&&this.value.length<5&&(this.value="")}t.addEventListener("input",e,!1),t.addEventListener("mouseover",e,!1)}inputTel&&inputTel.forEach(function(t){return maskTell(t)});var calendarStart,userInfoImage,Calendar=function(){function a(t,e){var n=this;_classCallCheck(this,a),_defineProperty(this,"setInput",function(t,e){if(e)return n.day=t,console.log(n.inputHtml),console.log("".concat(t," ").concat(n.monthShort[n.month])),n.inputHtml.value="".concat(t," ").concat(n.monthShort[n.month]," ").concat(n.year),n.removeClass(n.calendarHtml,"display-block"),n.render()}),this.calendarHtml=t,this.monthHtml=t.querySelector(".calendar__month_text"),this.calendarMonthLeft=t.querySelector(".calendar__month_left"),this.calendarMonthRight=t.querySelector(".calendar__month_right"),this.daysHtml=t.querySelectorAll(".calendar__day_item"),this.inputHtml=e.querySelector(".input"),this.buttonShow=e,this.day=(new Date).getDate(),this.months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],this.month=(new Date).getMonth(),this.year=(new Date).getFullYear(),this.today=new Date("".concat((new Date).getMonth()," ").concat((new Date).getDate()," ").concat((new Date).getFullYear())),this.monthShort=["янв","фев","мар","апр","май","июн","июл","авг","сен","окт","ноя","дек"]}return _createClass(a,[{key:"setAnimation",value:function(t,e){var n=2<arguments.length&&void 0!==arguments[2]?arguments[2]:"d-flex",a=3<arguments.length&&void 0!==arguments[3]?arguments[3]:"_hide",l=4<arguments.length&&void 0!==arguments[4]?arguments[4]:500;t.classList.contains(e)||(t.classList.add(n),t.classList.add(a),setTimeout(function(){t.classList.contains(e)||(t.classList.remove(n),t.classList.remove(a))},l))}},{key:"render",value:function(){this.monthHtml.textContent=this.months[this.month],this.days()}},{key:"decrementMonth",value:function(){var t=this;this.calendarMonthLeft.addEventListener("click",function(){--t.month,t.month<0&&(--t.year,t.month=11),t.render()})}},{key:"incrementMonth",value:function(){var t=this;this.calendarMonthRight.addEventListener("click",function(){t.month+=1,11<t.month&&(t.year+=1,t.month=0),t.render()})}},{key:"removeClass",value:function(t,e){t.classList.contains(e)&&t.classList.remove(e)}},{key:"show",value:function(){var t=this;return this.buttonShow.addEventListener("click",function(){t.calendarHtml.classList.toggle("display-block"),t.setAnimation(t.calendarHtml,"display-block","d-block")})}},{key:"days",value:function(){var n=this;if(this.daysHtml)for(var a=!0,l=!0,t=0;t<this.daysHtml.length;t++)!function(t){var e=new Date(n.year,n.month,1).getDay(),e=(0===e&&(e+=7),new Date(n.year,n.month,t-e+2));n.daysHtml[t].textContent=e.getDate(),removeClass(n.daysHtml[t],"_disabled"),removeClass(n.daysHtml[t],"_active"),n.day==n.daysHtml[t].textContent&&n.month===(new Date).getMonth()&&n.year===(new Date).getFullYear()&&n.daysHtml[t].classList.add("_active"),!(a=1==+n.daysHtml[t].textContent?!1:a)&&l&&1<+n.daysHtml[t].textContent&&(l=!1),((a=n.daysHtml[t-1]&&+n.daysHtml[t-1].textContent>=+n.daysHtml[t].textContent&&!l?!0:a)||n.today>new Date("".concat(n.month," ").concat(n.daysHtml[t].textContent," ").concat(n.year)))&&n.daysHtml[t].classList.add("_disabled"),n.daysHtml[t].onclick=function(){n.setInput(n.daysHtml[t].textContent,!n.daysHtml[t].classList.contains("_disabled")),n.setAnimation(n.calendarHtml,"display-block","d-block")}}(t)}},{key:"start",value:function(){this.render(),this.decrementMonth(),this.incrementMonth(),this.show()}}]),a}(),calendarFirst=document.querySelector(".calendar"),calendarFromActive=document.querySelector(".calendar-from__active"),userAvatar=(calendarFirst&&(calendarStart=new Calendar(calendarFirst,calendarFromActive)).start(),document.querySelector("#user_avatar"));userAvatar&&(userInfoImage=document.querySelector(".user-info__image img"),userAvatar.onchange=function(t){var e=new FormData;e.append("avatar",t.target.files[0]),fetch("".concat(BACKEND_URL_API,"/user_avatar"),{method:"POST",body:e}).then(function(t){if(200<=t.status&&t.status<300)return t.json();throw t}).then(function(t){userInfoImage.src=t.avatar}).catch(function(t){return t.json()})});