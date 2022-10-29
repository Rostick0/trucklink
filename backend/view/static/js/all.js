"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var a=0;a<t.length;a++){var r=t[a];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function _createClass(e,t,a){return t&&_defineProperties(e.prototype,t),a&&_defineProperties(e,a),Object.defineProperty(e,"prototype",{writable:!1}),e}function _defineProperty(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}var BACKEND_URL_API="http://backend/api",params=new Proxy(new URLSearchParams(window.location.search),{get:function(e,t){return e.get(t)}}),blockPassowrd=document.querySelectorAll(".block__password"),select=(blockPassowrd&&blockPassowrd.forEach(function(e){var t=e.querySelector(".password-icon"),a=e.querySelector(".input");t.onclick=function(){e.classList.contains("_show-password")?(e.classList.remove("_show-password"),a.type="password"):(e.classList.add("_show-password"),a.type="text")}}),document.querySelectorAll(".select"));function removeClass(e,t){e.classList.contains(t)&&e.classList.remove(t)}select&&select.forEach(function(t){var e=t.querySelectorAll(".select__option"),a=t.querySelector(".select__input");e.forEach(function(e){e.onclick=function(){a.value=e.textContent.trim()}}),t.onclick=function(e){"LABEL"!==e.target.tagName&&t.classList.toggle("_active")}});var arrowLeft,arrowRight,headerSliderList,countSliderItem,transformValue,incrementTransformValue,countSliderItemValue,slider=document.querySelector(".header__slider"),inputTel=(slider&&(arrowLeft=slider.querySelector(".header__slider_arrow"),arrowRight=slider.querySelector(".header__slider_arrow._right"),headerSliderList=slider.querySelector(".header__slider_list"),countSliderItem=slider.querySelectorAll(".header__slider_item").length,transformValue=0,countSliderItemValue=(countSliderItem-3)*(incrementTransformValue=33.3),window.screen.width<1024&&(countSliderItemValue=(countSliderItem-1)*(incrementTransformValue=100)),arrowLeft.onclick=function(){0<=transformValue||(transformValue+=incrementTransformValue,headerSliderList.style="--transformValue: ".concat(transformValue,"%"))},arrowRight.onclick=function(){countSliderItemValue<=-transformValue||(transformValue-=incrementTransformValue,headerSliderList.style="--transformValue: ".concat(transformValue,"%"))}),document.querySelectorAll(".input-tel"));function maskTell(e){var s;function t(e){e.keyCode&&(s=e.keyCode);this.selectionStart<2&&e.preventDefault();var t="+ _ (___)___-__-__",a=0,r=t.replace(/\D/g,""),n=this.value.replace(/\D/g,""),o=t.replace(/[_\d]/g,function(e){return a<n.length?n.charAt(a++)||r.charAt(a):e}),t=(-1!=(a=o.indexOf("_"))&&(a<5&&(a=2),o=o.slice(0,a)),t.substr(0,this.value.length).replace(/_+/g,function(e){return"\\d{1,"+e.length+"}"}).replace(/[+()]/g,"\\$&"));(!(t=new RegExp("^"+t+"$")).test(this.value)||this.value.length<3||47<s&&s<58)&&(this.value=o),"blur"==e.type&&this.value.length<5&&(this.value="")}e.addEventListener("input",t,!1),e.addEventListener("mouseover",t,!1)}inputTel&&inputTel.forEach(function(e){return maskTell(e)});var calendarStart,Calendar=function(){function r(e,t){var a=this;_classCallCheck(this,r),_defineProperty(this,"setInput",function(e,t){if(t)return a.day=e,console.log(a.inputHtml),console.log("".concat(e," ").concat(a.monthShort[a.month])),a.inputHtml.value="".concat(e," ").concat(a.monthShort[a.month]," ").concat(a.year),a.removeClass(a.calendarHtml,"display-block"),a.render()}),this.calendarHtml=e,this.monthHtml=e.querySelector(".calendar__month_text"),this.calendarMonthLeft=e.querySelector(".calendar__month_left"),this.calendarMonthRight=e.querySelector(".calendar__month_right"),this.daysHtml=e.querySelectorAll(".calendar__day_item"),this.inputHtml=t.querySelector(".input"),this.buttonShow=t,this.day=(new Date).getDate(),this.months=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"],this.month=(new Date).getMonth(),this.year=(new Date).getFullYear(),this.today=new Date("".concat((new Date).getMonth()," ").concat((new Date).getDate()," ").concat((new Date).getFullYear())),this.monthShort=["янв","фев","мар","апр","май","июн","июл","авг","сен","окт","ноя","дек"]}return _createClass(r,[{key:"setAnimation",value:function(e,t){var a=2<arguments.length&&void 0!==arguments[2]?arguments[2]:"d-flex",r=3<arguments.length&&void 0!==arguments[3]?arguments[3]:"_hide",n=4<arguments.length&&void 0!==arguments[4]?arguments[4]:500;e.classList.contains(t)||(e.classList.add(a),e.classList.add(r),setTimeout(function(){e.classList.contains(t)||(e.classList.remove(a),e.classList.remove(r))},n))}},{key:"render",value:function(){this.monthHtml.textContent=this.months[this.month],this.days()}},{key:"decrementMonth",value:function(){var e=this;this.calendarMonthLeft.addEventListener("click",function(){--e.month,e.month<0&&(--e.year,e.month=11),e.render()})}},{key:"incrementMonth",value:function(){var e=this;this.calendarMonthRight.addEventListener("click",function(){e.month+=1,11<e.month&&(e.year+=1,e.month=0),e.render()})}},{key:"removeClass",value:function(e,t){e.classList.contains(t)&&e.classList.remove(t)}},{key:"show",value:function(){var e=this;return this.buttonShow.addEventListener("click",function(){e.calendarHtml.classList.toggle("display-block"),e.setAnimation(e.calendarHtml,"display-block","d-block")})}},{key:"days",value:function(){var a=this;if(this.daysHtml)for(var r=!0,n=!0,e=0;e<this.daysHtml.length;e++)!function(e){var t=new Date(a.year,a.month,1).getDay(),t=(0===t&&(t+=7),new Date(a.year,a.month,e-t+2));a.daysHtml[e].textContent=t.getDate(),removeClass(a.daysHtml[e],"_disabled"),removeClass(a.daysHtml[e],"_active"),a.day==a.daysHtml[e].textContent&&a.month===(new Date).getMonth()&&a.year===(new Date).getFullYear()&&a.daysHtml[e].classList.add("_active"),!(r=1==+a.daysHtml[e].textContent?!1:r)&&n&&1<+a.daysHtml[e].textContent&&(n=!1),((r=a.daysHtml[e-1]&&+a.daysHtml[e-1].textContent>=+a.daysHtml[e].textContent&&!n?!0:r)||a.today>new Date("".concat(a.month," ").concat(a.daysHtml[e].textContent," ").concat(a.year)))&&a.daysHtml[e].classList.add("_disabled"),a.daysHtml[e].onclick=function(){a.setInput(a.daysHtml[e].textContent,!a.daysHtml[e].classList.contains("_disabled")),a.setAnimation(a.calendarHtml,"display-block","d-block")}}(e)}},{key:"start",value:function(){this.render(),this.decrementMonth(),this.incrementMonth(),this.show()}}]),r}(),calendarFirst=document.querySelector(".calendar"),calendarFromActive=document.querySelector(".calendar-from__active");function googleSearch(e,t){var a=new google.maps.places.Autocomplete(e);google.maps.event.addListener(a,"place_changed",function(){var e=a.getPlace();t.value=e.name})}calendarFirst&&(calendarStart=new Calendar(calendarFirst,calendarFromActive)).start();var userInfoImage,addresSearchFromText=document.querySelector(".addres-search._from_text"),addresSearchFrom=document.querySelector(".addres-search._from"),addresSearchToText=(addresSearchFromText&&addresSearchFrom&&google.maps.event.addDomListener(window,"load",googleSearch(addresSearchFromText,addresSearchFrom)),document.querySelector(".addres-search._to_text")),addresSearchTo=document.querySelector(".addres-search._to"),userAvatar=(addresSearchToText&&addresSearchTo&&google.maps.event.addDomListener(window,"load",googleSearch(addresSearchToText,addresSearchTo)),document.querySelector("#user_avatar"));userAvatar&&(userInfoImage=document.querySelector(".user-info__image img"),userAvatar.onchange=function(e){var t=new FormData;t.append("avatar",e.target.files[0]),fetch("".concat(BACKEND_URL_API,"/user_avatar"),{method:"POST",body:t}).then(function(e){if(200<=e.status&&e.status<300)return e.json();throw e}).then(function(e){userInfoImage.src=e.avatar}).catch(function(e){return e.json()})});
"use strict";var visibilityElems,inputSearch,inputSearchList,inputSearchItem,inputSearchBlock=document.querySelector(".input-search__block");inputSearchBlock&&(visibilityElems=function(e){inputSearchItem.forEach(function(t){if(!t.querySelector("label").textContent.trim().toLocaleLowerCase().includes(e.trim().toLocaleLowerCase()))return t.classList.add("d-none");t.classList.contains("d-none")&&t.classList.remove("d-none")})},inputSearch=inputSearchBlock.querySelector(".input-search"),inputSearchList=inputSearchBlock.querySelector(".input-search__list"),inputSearchItem=inputSearchBlock.querySelectorAll(".input-search__item"),inputSearch.onclick=function(){inputSearchList.classList.add("d-flex")},inputSearch.oninput=function(t){inputSearchList.classList.add("d-flex"),visibilityElems(t.target.value)},inputSearch.onblur=function(){setTimeout(function(){inputSearchList.classList.contains("d-flex")&&inputSearchList.classList.remove("d-flex")},250)},inputSearchItem.forEach(function(t){t.onclick=function(){inputSearch.value=t.textContent.trim(),inputSearchList.classList.contains("d-flex")&&inputSearchList.classList.remove("d-flex")}}));
"use strict";var inputPhoto,inputBlockFileContentText,inputBlockFile=document.querySelector(".input__block_file"),applicationDelete=(inputBlockFile&&(inputPhoto=inputBlockFile.querySelector("#photo"),inputBlockFileContentText=inputBlockFile.querySelector(".input__block_file_content_text"),inputPhoto.onchange=function(){inputPhoto.files[0]&&(inputPhoto.files[0],inputBlockFileContentText.textContent="Ваш файл загружен",inputPhoto.title="Вы можете заново загрузить файл")}),document.querySelector("._application-delete")),applicationTableFilter=(applicationDelete&&(applicationDelete.onclick=function(){confirm("Подтвердите удаление")&&fetch("".concat(BACKEND_URL_API,"/application?application_id=").concat(params.id),{method:"DELETE"}).then(function(n){if(200<=n.status&&n.status<300)return n.json();throw n}).then(function(){window.history.go(-1)}).catch(function(n){return n.json()}).then(function(n){return alert(null==n?void 0:n.message)})}),document.querySelector(".application__table tbody"));function getApplications(t,i){var n=2<arguments.length&&void 0!==arguments[2]?arguments[2]:"";return fetch("".concat(BACKEND_URL_API,"/application").concat(n)).then(function(n){return n.json()}).then(function(n){i.forEach(function(n){return n.remove()}),console.log(n),n.forEach(function(n){return t.insertAdjacentHTML("beforeend",'<tr class="application__item">\n                <td>\n                    <div class="application__flex">\n                        <div class="application__status"></div>\n                        <span>\n                            '.concat(null==n?void 0:n.status,'\n                        </span>\n                    </div>\n                </td>\n                <td colspan=2>\n                    <div class="application__route">\n                        <div class="application__way">\n                            <div class="application__from" title="').concat(null==n?void 0:n.from,'">\n                                <img src="./view/static/img/flag.png" alt="').concat(null==n?void 0:n.from,'">\n                                ').concat(null==n?void 0:n.from,'\n                            </div>\n                            <span class="applicaton__arrow">\n                                →\n                            </span>\n                            <div class="application__to" title="').concat(null==n?void 0:n.to,'">\n                                <img src="./view/static/img/flag.png" alt="').concat(null==n?void 0:n.to,'">\n                                ').concat(null==n?void 0:n.to,'\n                            </div>\n                        </div>\n                    </div>\n                </td>\n                <td>\n                    <div class="application__date">\n                        ').concat(null==n?void 0:n.date,'\n                    </div>\n                </td>\n                <td>\n                    <div class="application__transport">\n                        ').concat(null==n?void 0:n.transport_type,'\n                    </div>\n                </td>\n                <td>\n                    <div class="application__payment">\n                        ').concat(null==n?void 0:n.price,'\n                    </div>\n                </td>\n                <td>\n                    <div class="application__flex justify-center">\n                        <div class="application__chat">\n                            \x3c!-- <div class="application__chat_count">\n                            0\n                        </div> --\x3e\n                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />\n                                <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />\n                            </svg>\n                        </div>\n                    </div>\n                </td>\n                <td>\n                    <div class="application__flex justify-center">\n                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                            <path d="M13.4002 17.4201H10.8902C9.25016 17.4201 7.92016 16.0401 7.92016 14.3401C7.92016 13.9301 8.26016 13.5901 8.67016 13.5901C9.08016 13.5901 9.42016 13.9301 9.42016 14.3401C9.42016 15.2101 10.0802 15.9201 10.8902 15.9201H13.4002C14.0502 15.9201 14.5902 15.3401 14.5902 14.6401C14.5902 13.7701 14.2802 13.6001 13.7702 13.4201L9.74016 12.0001C8.96016 11.7301 7.91016 11.1501 7.91016 9.36008C7.91016 7.82008 9.12016 6.58008 10.6002 6.58008H13.1102C14.7502 6.58008 16.0802 7.96008 16.0802 9.66008C16.0802 10.0701 15.7402 10.4101 15.3302 10.4101C14.9202 10.4101 14.5802 10.0701 14.5802 9.66008C14.5802 8.79008 13.9202 8.08008 13.1102 8.08008H10.6002C9.95016 8.08008 9.41016 8.66008 9.41016 9.36008C9.41016 10.2301 9.72016 10.4001 10.2302 10.5801L14.2602 12.0001C15.0402 12.2701 16.0902 12.8501 16.0902 14.6401C16.0802 16.1701 14.8802 17.4201 13.4002 17.4201Z" fill="white" />\n                            <path d="M12 18.75C11.59 18.75 11.25 18.41 11.25 18V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V18C12.75 18.41 12.41 18.75 12 18.75Z" fill="white" />\n                            <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="white" />\n                        </svg>\n                        <span>\n                            Pay order\n                        </span>\n                    </div>\n                </td>\n                <td>\n                    <div class="application__flex justify-center">\n                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                            <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />\n                        </svg>\n                    </div>\n                </td>\n                <td>\n                    <a class="application__flex justify-center" href="/application_edit?id=').concat(null==n?void 0:n.application_id,'">\n                        <svg width="1.19rem" height="1.19rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">\n                            <path d="M4.38582 15.4531C3.90291 15.4531 3.45166 15.2869 3.12707 14.9781C2.71541 14.5902 2.51749 14.0044 2.58874 13.3711L2.88166 10.8061C2.93707 10.3231 3.22999 9.6819 3.57041 9.33356L10.07 2.45398C11.6929 0.736065 13.3871 0.688565 15.105 2.31148C16.8229 3.9344 16.8704 5.62856 15.2475 7.34648L8.74791 14.2261C8.41541 14.5823 7.79791 14.9148 7.31499 14.994L4.76582 15.4294C4.63124 15.4373 4.51249 15.4531 4.38582 15.4531ZM12.6112 2.30357C12.0017 2.30357 11.4712 2.68357 10.9329 3.25357L4.43332 10.1411C4.27499 10.3073 4.09291 10.7031 4.06124 10.9327L3.76832 13.4977C3.73666 13.759 3.79999 13.9727 3.94249 14.1073C4.08499 14.2419 4.29874 14.2894 4.55999 14.2498L7.10916 13.8144C7.33874 13.7748 7.71874 13.569 7.87707 13.4027L14.3767 6.52315C15.3583 5.47815 15.7146 4.51232 14.2817 3.16648C13.6483 2.5569 13.1021 2.30357 12.6112 2.30357Z" fill="white" />\n                            <path d="M13.7275 8.66932C13.7117 8.66932 13.6879 8.66932 13.6721 8.66932C11.2021 8.42391 9.21502 6.54766 8.83502 4.09349C8.78752 3.76891 9.00919 3.46807 9.33377 3.41266C9.65835 3.36516 9.95919 3.58682 10.0146 3.91141C10.3154 5.82724 11.8671 7.29974 13.7988 7.48974C14.1234 7.52141 14.3609 7.81432 14.3292 8.13891C14.2896 8.43974 14.0284 8.66932 13.7275 8.66932Z" fill="white" />\n                            <path d="M16.625 18.0098H2.375C2.05042 18.0098 1.78125 17.7406 1.78125 17.416C1.78125 17.0914 2.05042 16.8223 2.375 16.8223H16.625C16.9496 16.8223 17.2188 17.0914 17.2188 17.416C17.2188 17.7406 16.9496 18.0098 16.625 18.0098Z" fill="white" />\n                        </svg>\n                    </a>\n                </td>\n            </tr>'))})})}function getApplicationsFilter(){var n=applicationTableFilter.querySelector(".application-filter__button");n&&(n.onclick=function(){document.getElementsByName("from")[0].value,document.getElementsByName("to")[0].value;var t=applicationTableFilter.querySelectorAll(".application__item");fetch("".concat(BACKEND_URL_API,"/application")).then(function(n){return n.json()}).then(function(n){t.forEach(function(n){return n.remove()}),console.log(n),n.forEach(function(n){return applicationTableFilter.insertAdjacentHTML("beforeend",'<tr class="application__item">\n                        <td>\n                            <div class="application__flex">\n                                <div class="application__status"></div>\n                                <span>\n                                    '.concat(null==n?void 0:n.status,'\n                                </span>\n                            </div>\n                        </td>\n                        <td colspan=2>\n                            <div class="application__route">\n                                <div class="application__way">\n                                    <div class="application__from" title="').concat(null==n?void 0:n.from,'">\n                                        <img src="./view/static/img/flag.png" alt="').concat(null==n?void 0:n.from,'">\n                                        ').concat(null==n?void 0:n.from,'\n                                    </div>\n                                    <span class="applicaton__arrow">\n                                        →\n                                    </span>\n                                    <div class="application__to" title="').concat(null==n?void 0:n.to,'">\n                                        <img src="./view/static/img/flag.png" alt="').concat(null==n?void 0:n.to,'">\n                                        ').concat(null==n?void 0:n.to,'\n                                    </div>\n                                </div>\n                            </div>\n                        </td>\n                        <td>\n                            <div class="application__date">\n                                ').concat(null==n?void 0:n.date,'\n                            </div>\n                        </td>\n                        <td>\n                            <div class="application__transport">\n                                ').concat(null==n?void 0:n.transport_type,'\n                            </div>\n                        </td>\n                        <td>\n                            <div class="application__payment">\n                                ').concat(null==n?void 0:n.price,'\n                            </div>\n                        </td>\n                        <td>\n                            <div class="application__flex justify-center">\n                                <div class="application__chat">\n                                    \x3c!-- <div class="application__chat_count">\n                                    0\n                                </div> --\x3e\n                                    <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                                        <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />\n                                        <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />\n                                    </svg>\n                                </div>\n                            </div>\n                        </td>\n                        <td>\n                            <div class="application__flex justify-center">\n                                <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                                    <path d="M13.4002 17.4201H10.8902C9.25016 17.4201 7.92016 16.0401 7.92016 14.3401C7.92016 13.9301 8.26016 13.5901 8.67016 13.5901C9.08016 13.5901 9.42016 13.9301 9.42016 14.3401C9.42016 15.2101 10.0802 15.9201 10.8902 15.9201H13.4002C14.0502 15.9201 14.5902 15.3401 14.5902 14.6401C14.5902 13.7701 14.2802 13.6001 13.7702 13.4201L9.74016 12.0001C8.96016 11.7301 7.91016 11.1501 7.91016 9.36008C7.91016 7.82008 9.12016 6.58008 10.6002 6.58008H13.1102C14.7502 6.58008 16.0802 7.96008 16.0802 9.66008C16.0802 10.0701 15.7402 10.4101 15.3302 10.4101C14.9202 10.4101 14.5802 10.0701 14.5802 9.66008C14.5802 8.79008 13.9202 8.08008 13.1102 8.08008H10.6002C9.95016 8.08008 9.41016 8.66008 9.41016 9.36008C9.41016 10.2301 9.72016 10.4001 10.2302 10.5801L14.2602 12.0001C15.0402 12.2701 16.0902 12.8501 16.0902 14.6401C16.0802 16.1701 14.8802 17.4201 13.4002 17.4201Z" fill="white" />\n                                    <path d="M12 18.75C11.59 18.75 11.25 18.41 11.25 18V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V18C12.75 18.41 12.41 18.75 12 18.75Z" fill="white" />\n                                    <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="white" />\n                                </svg>\n                                <span>\n                                    Pay order\n                                </span>\n                            </div>\n                        </td>\n                        <td>\n                            <div class="application__flex justify-center">\n                                <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                                    <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />\n                                </svg>\n                            </div>\n                        </td>\n                        <td>\n                            <a class="application__flex justify-center" href="/application_edit?id=').concat(null==n?void 0:n.application_id,'">\n                                <svg width="1.19rem" height="1.19rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">\n                                    <path d="M4.38582 15.4531C3.90291 15.4531 3.45166 15.2869 3.12707 14.9781C2.71541 14.5902 2.51749 14.0044 2.58874 13.3711L2.88166 10.8061C2.93707 10.3231 3.22999 9.6819 3.57041 9.33356L10.07 2.45398C11.6929 0.736065 13.3871 0.688565 15.105 2.31148C16.8229 3.9344 16.8704 5.62856 15.2475 7.34648L8.74791 14.2261C8.41541 14.5823 7.79791 14.9148 7.31499 14.994L4.76582 15.4294C4.63124 15.4373 4.51249 15.4531 4.38582 15.4531ZM12.6112 2.30357C12.0017 2.30357 11.4712 2.68357 10.9329 3.25357L4.43332 10.1411C4.27499 10.3073 4.09291 10.7031 4.06124 10.9327L3.76832 13.4977C3.73666 13.759 3.79999 13.9727 3.94249 14.1073C4.08499 14.2419 4.29874 14.2894 4.55999 14.2498L7.10916 13.8144C7.33874 13.7748 7.71874 13.569 7.87707 13.4027L14.3767 6.52315C15.3583 5.47815 15.7146 4.51232 14.2817 3.16648C13.6483 2.5569 13.1021 2.30357 12.6112 2.30357Z" fill="white" />\n                                    <path d="M13.7275 8.66932C13.7117 8.66932 13.6879 8.66932 13.6721 8.66932C11.2021 8.42391 9.21502 6.54766 8.83502 4.09349C8.78752 3.76891 9.00919 3.46807 9.33377 3.41266C9.65835 3.36516 9.95919 3.58682 10.0146 3.91141C10.3154 5.82724 11.8671 7.29974 13.7988 7.48974C14.1234 7.52141 14.3609 7.81432 14.3292 8.13891C14.2896 8.43974 14.0284 8.66932 13.7275 8.66932Z" fill="white" />\n                                    <path d="M16.625 18.0098H2.375C2.05042 18.0098 1.78125 17.7406 1.78125 17.416C1.78125 17.0914 2.05042 16.8223 2.375 16.8223H16.625C16.9496 16.8223 17.2188 17.0914 17.2188 17.416C17.2188 17.7406 16.9496 18.0098 16.625 18.0098Z" fill="white" />\n                                </svg>\n                            </a>\n                        </td>\n                    </tr>'))})}),getApplications(applicationTableFilter,t,"")})}applicationTableFilter&&getApplicationsFilter();
"use strict";var deleteHeightImportant,chatTextarea=document.querySelector(".chat__textarea");chatTextarea&&(deleteHeightImportant=function e(){chatTextarea.classList.contains("_height-important")&&(chatTextarea.classList.remove("_height-important"),chatTextarea.removeEventListener("autosize:resized",e))},autosize(chatTextarea),chatTextarea.addEventListener("autosize:resized",deleteHeightImportant));