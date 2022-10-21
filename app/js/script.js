const blockPassowrd = document.querySelectorAll('.block__password');

if (blockPassowrd) {
    blockPassowrd.forEach(elem => {
        const passwordIcon = elem.querySelector('.password-icon');
        const input = elem.querySelector('.input');

        passwordIcon.onclick = () => {
            if (elem.classList.contains('_show-password')) {
                elem.classList.remove('_show-password');
                input.type = "password";
                return;
            }

            elem.classList.add('_show-password');
            input.type = "text";
        }
    })
}
const select = document.querySelectorAll('.select');

if (select) {
    select.forEach(elem => {
        const selectOption = elem.querySelectorAll('.select__option');
        const selectInput = elem.querySelector('.select__input');

        selectOption.forEach(option => {
            option.onclick = () => {
                selectInput.value = option.textContent.trim();
            }
        })

        elem.onclick = e => {
            if (e.target.tagName === 'LABEL') return;

            elem.classList.toggle('_active');
        }
    })
}

const personalAccountNavigationItem = document.querySelectorAll('.personal-account__navigation_item');
const personalAccountRight = document.querySelector('.personal-account__right');

function removeClass(elem, classHtml) {
    if (!elem.classList.contains(classHtml)) return;

    elem.classList.remove(classHtml)
}

if (personalAccountNavigationItem && personalAccountRight) {
    const personalAccountRightHtmls = [
        {
            type: 'my_applications',
            html: `<div class="personal-account__title section-title">
            Заявки
        </div>
        <ul class="personal-account__application_list">
            <li class="personal-account__application_item">
                <div class="personal-account__application_item_top application__item">
                    <div class="application__route">
                        <div class="application__status"></div>
                        <div class="application__way">
                            <div class="application__from">
                                <img src="../img/flag.png" alt=""> Нью-Йорк
                            </div>
                            <span class="applicaton__arrow">
                                →
                            </span>
                            <div class="application__to">
                                <img src="../img/flag.png" alt=""> Вашингтон-на-Бразосе
                            </div>
                        </div>
                    </div>
                    <div class="application__date">
                        15 апр — 23 апр 
                    </div>
                    <div class="application__transport">
                        Специальная техника
                    </div>
                    <div class="application__payment">        
                        $10 000
                    </div>
                </div>
                <div class="personal-account__application_item_bottom">
                    <a class="button-second" href="">
                        Отследить груз
                    </a>
                    <a class="button-second" href="">
                        Подробнее
                    </a>
                    <a class="button-second" href="">
                        Редактировать
                    </a>
                </div>
            </li>
        </ul>`
        },
        {
            type: 'about_me',
            html: `<div class="personal-account__title section-title">
            Информация
        </div>
        <form class="personal-account__form">
            <div class="input__block">
                <label class="input__title" for="input">
                    Имя
                </label>
                <input class="input" type="text" value="Константин" id="input">
            </div>
            <div class="input__block">
                <label class="input__title" for="input">
                    Фамилия
                </label>
                <input class="input" type="text" value="Константинопольский" id="input">
            </div>
            <div class="input__block">
                <label class="input__title" for="input">
                    Текст
                </label>
                <input class="input" type="text" id="input">
            </div>
            <div class="input__block">
                <label class="input__title" for="input">
                    Текст
                </label>
                <input class="input" type="text" id="input">
            </div>
            <div class="input__block">
                <label class="input__title" for="input">
                    Текст
                </label>
                <input class="input" type="text" id="input">
            </div>
            <div class="input__block">
                <label class="input__title" for="input">
                    Текст
                </label>
                <input class="input" type="text" id="input">
            </div>
        </form>`
        }
    ];

    personalAccountNavigationItem.forEach(item => {
        item.onclick = () => {
            for (let i = 0; i < personalAccountRightHtmls.length; i++) {
                if (personalAccountRightHtmls[i].type === item.getAttribute('data-type')) {
                    personalAccountNavigationItem.forEach(elem => removeClass(elem, '_active'));
                    item.classList.add('_active')
                    personalAccountRight.innerHTML = personalAccountRightHtmls[i].html
                    break;
                }
            }
        }
    })
}


const slider = document.querySelector('.header__slider');

if (slider) {
    const arrowLeft = slider.querySelector('.header__slider_arrow');
    const arrowRight = slider.querySelector('.header__slider_arrow._right');
    const headerSliderList = slider.querySelector('.header__slider_list');
    const countSliderItem = slider.querySelectorAll('.header__slider_item').length;

    let transformValue = 0;
    let incrementTransformValue = 33.3;
    let countSliderItemValue = (countSliderItem - 3) * incrementTransformValue;

    if (window.screen.width < 1024) {
        incrementTransformValue = 100;
        countSliderItemValue = (countSliderItem - 1) * incrementTransformValue;
    }

    arrowLeft.onclick = () => {
        if (0 <= transformValue) {
            return;
        }

        transformValue += incrementTransformValue;
        headerSliderList.style= `--transformValue: ${transformValue}%`;
    }

    arrowRight.onclick = () => {
        if (countSliderItemValue <= -transformValue) {
            return;
        }

        transformValue -= incrementTransformValue;
        headerSliderList.style= `--transformValue: ${transformValue}%`;
    }
}

const inputTel = document.querySelectorAll('.input-tel');

if (inputTel) {
    inputTel.forEach(elem => maskTell(elem));
}
function maskTell(input) {
    let keyCode;

    function mask(event) {
        event.keyCode && (keyCode = event.keyCode);
        let pos = this.selectionStart;

        if (pos < 2) event.preventDefault();

        let matrix = "+ _ (___)___-__-__",
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = this.value.replace(/\D/g, ""),
            new_value = matrix.replace(/[_\d]/g, function(a) {
                return i < val.length ? val.charAt(i++) || def.charAt(i) : a
            });

        i = new_value.indexOf("_");

        if (i != -1) {
            i < 5 && (i = 2);
            new_value = new_value.slice(0, i)
        }

        let reg = matrix.substr(0, this.value.length).replace(/_+/g,
            function(a) {
                return "\\d{1," + a.length + "}"
            }).replace(/[+()]/g, "\\$&");

        reg = new RegExp("^" + reg + "$");

        if (!reg.test(this.value) || this.value.length < 3 || keyCode > 47 && keyCode < 58) this.value = new_value;
        if (event.type == "blur" && this.value.length < 5) this.value = "";
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("mouseover", mask, false);
};