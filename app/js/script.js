const BACKEND_URL_API = 'http://backend/api';

const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
  });

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
                    personalAccountNavigationItem.forEach(elem => this.removeClass(elem, '_active'));
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
        headerSliderList.style = `--transformValue: ${transformValue}%`;
    }

    arrowRight.onclick = () => {
        if (countSliderItemValue <= -transformValue) {
            return;
        }

        transformValue -= incrementTransformValue;
        headerSliderList.style = `--transformValue: ${transformValue}%`;
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
            new_value = matrix.replace(/[_\d]/g, function (a) {
                return i < val.length ? val.charAt(i++) || def.charAt(i) : a
            });

        i = new_value.indexOf("_");

        if (i != -1) {
            i < 5 && (i = 2);
            new_value = new_value.slice(0, i)
        }

        let reg = matrix.substr(0, this.value.length).replace(/_+/g,
            function (a) {
                return "\\d{1," + a.length + "}"
            }).replace(/[+()]/g, "\\$&");

        reg = new RegExp("^" + reg + "$");

        if (!reg.test(this.value) || this.value.length < 3 || keyCode > 47 && keyCode < 58) this.value = new_value;
        if (event.type == "blur" && this.value.length < 5) this.value = "";
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("mouseover", mask, false);
};

class Calendar {
    constructor(calendarHtml, buttonShow) {
        this.calendarHtml = calendarHtml;
        this.monthHtml = calendarHtml.querySelector('.calendar__month_text');
        this.calendarMonthLeft = calendarHtml.querySelector('.calendar__month_left');
        this.calendarMonthRight = calendarHtml.querySelector('.calendar__month_right');
        this.daysHtml = calendarHtml.querySelectorAll('.calendar__day_item');
        this.inputHtml = buttonShow.querySelector('.input');
        this.buttonShow = buttonShow;
        this.day = new Date().getDate();
        this.months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        this.month = new Date().getMonth();
        this.year = new Date().getFullYear();
        this.today = new Date(`${new Date().getMonth()} ${new Date().getDate()} ${new Date().getFullYear()}`)
        this.monthShort = [
            'янв',
            'фев',
            'мар',
            'апр',
            'май',
            'июн',
            'июл',
            'авг',
            'сен',
            'окт',
            'ноя',
            'дек'
        ];
    }

    setAnimation(elem, determinantProperty, showProperty = 'd-flex', hideProperty = '_hide', duration = 500) {
        if (elem.classList.contains(determinantProperty)) {
            return;
        }

        elem.classList.add(showProperty);
        elem.classList.add(hideProperty);

        setTimeout(() => {
            if (elem.classList.contains(determinantProperty)) {
                return;
            }

            elem.classList.remove(showProperty);
            elem.classList.remove(hideProperty);
        }, duration);
    }

    render() {
        this.monthHtml.textContent = this.months[this.month];

        this.days();
    }

    decrementMonth() {
        this.calendarMonthLeft.addEventListener('click', () => {
            this.month -= 1;

            if (this.month < 0) {
                this.year -= 1
                this.month = 11;
            }

            this.render();
        });
    }

    incrementMonth() {
        this.calendarMonthRight.addEventListener('click', () => {
            this.month += 1;
            if (this.month > 11) {
                this.year += 1
                this.month = 0;
            }

            this.render();
        });
    }

    removeClass(elem, classCss) {
        if (elem.classList.contains(classCss)) {
            elem.classList.remove(classCss);
        }
    }

    setInput = (day, disabled) => {
        if (!disabled) return;

        this.day = day;
        console.log(this.inputHtml);
        console.log(`${day} ${this.monthShort[this.month]}`);
        this.inputHtml.value = `${day} ${this.monthShort[this.month]} ${this.year}`;
        this.removeClass(this.calendarHtml, 'display-block');
        return this.render();
    }

    show() {
        return this.buttonShow.addEventListener('click', () => {
            this.calendarHtml.classList.toggle('display-block');

            this.setAnimation(this.calendarHtml, 'display-block', 'd-block');
        })
    }

    days() {
        if (!this.daysHtml) {
            return;
        }

        let disabled = true;
        let firstOne = true;

        for (let i = 0; i < this.daysHtml.length; i++) {
            let day = new Date(this.year, this.month, 1).getDay();

            if (day === 0) day += 7;

            let date = new Date(this.year, this.month, i - day + 2)

            this.daysHtml[i].textContent = date.getDate();

            removeClass(this.daysHtml[i], '_disabled');
            removeClass(this.daysHtml[i], '_active');

            if (this.day == this.daysHtml[i].textContent && this.month === new Date().getMonth() && this.year === new Date().getFullYear()) this.daysHtml[i].classList.add('_active');

            if (+this.daysHtml[i].textContent === 1) disabled = false;

            if (!disabled && firstOne && +this.daysHtml[i].textContent > 1) firstOne = false;

            if (this.daysHtml[i - 1] && +this.daysHtml[i - 1].textContent >= +this.daysHtml[i].textContent && !firstOne) disabled = true;

            if (disabled) this.daysHtml[i].classList.add('_disabled');
            else if (this.today > new Date(`${this.month} ${this.daysHtml[i].textContent} ${this.year}`)) this.daysHtml[i].classList.add('_disabled');

            this.daysHtml[i].onclick = () => {
                this.setInput(this.daysHtml[i].textContent, !this.daysHtml[i].classList.contains('_disabled'));
                this.setAnimation(this.calendarHtml, 'display-block', 'd-block');
            }
        }
    }

    start() {
        this.render();

        this.decrementMonth();
        this.incrementMonth();

        this.show();
    }
}

const calendarFirst = document.querySelector('.calendar');
const calendarFromActive = document.querySelector('.calendar-from__active');


if (calendarFirst) {
    const calendarStart = new Calendar(calendarFirst, calendarFromActive);
    calendarStart.start();
}

// function googleSearch(input, inputChecked) {
//     const autocomplete = new google.maps.places.Autocomplete(input);
//     google.maps.event.addListener(autocomplete, 'place_changed', function () {
//         const place = autocomplete.getPlace();
//         inputChecked.value = place.name;
//     });
// }

// const addresSearchFromText = document.querySelector('.addres-search._from_text');
// const addresSearchFrom = document.querySelector('.addres-search._from');

// if (addresSearchFromText && addresSearchFrom) {
//     google.maps.event.addDomListener(window, 'load', googleSearch(addresSearchFromText, addresSearchFrom));   
// }

// const addresSearchToText = document.querySelector('.addres-search._to_text');
// const addresSearchTo = document.querySelector('.addres-search._to');

// if (addresSearchToText && addresSearchTo) {
//     google.maps.event.addDomListener(window, 'load', googleSearch(addresSearchToText, addresSearchTo));   
// }

const userAvatar = document.querySelector('#user_avatar');

if (userAvatar) {
    const userInfoImage = document.querySelector('.user-info__image img')

    userAvatar.onchange = e => {
        const formData = new FormData();

        formData.append('avatar', e.target.files[0]);
        fetch(`${BACKEND_URL_API}/user_avatar`, {
            method: 'POST',
            body: formData
        })
        .then(res => {
            if (res.status >= 200 && res.status < 300) {
                return res.json();
            } 
            
            throw res;
        })
        .then(res => {
            userInfoImage.src = res.avatar
        })
        .catch(data => data.json())
    }
}