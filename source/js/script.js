const BACKEND_URL = `http://backend/http`;

const monthShort = [
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

function throttle(func, ms) {
    let locked = false;

    return function() {
        if (locked) return

        const context = this;
        const args = arguments;

        locked = true;

        setTimeout(() => {
            func.apply(context, args);
            locked = false;
        }, ms)
    }
}

function removeClass(elem, classCss) {
    if (elem.classList.contains(classCss)) {
        elem.classList.remove(classCss);
    }
}
 
function normalizeDate(date) {
    let result = date.slice(5);
    result = result.slice(result.length - 2) + ' ' + monthShort[+result.slice(0, 2)-1];
    return result;
}

const selects = document.querySelectorAll('._select');

function select(selects) {
    if (!selects) {
        return;
    }

    selects.forEach(select => {
        const selectShow = select.querySelector('._select__show');
        const arrow = select.querySelector('._select__arrow');
        const selectList = select.querySelector('._select__list');
        const selectInput = select.querySelector('._select__input');
        const list = select.querySelectorAll('li._select__item');

        if (selectInput) {
            selectInput.oninput = throttle(() => {
                let valueInput = selectInput.value;
                valueInput = valueInput.trim();
                valueInput = valueInput.toLowerCase();

                list.forEach(elem => {
                    let text = elem.textContent;
                    text = text.trim();
                    text = text.toLowerCase();

                    if (text.search(valueInput) === -1) {
                        elem.style.display = 'none';
                    } else {
                        elem.style.display = '';
                    }
                })
            }, 500);
        }
    
        select.addEventListener('click', e => {
            if (e.target == selectInput) {
                return;
            }

            if (e.pointerId <= -1) {
                return;
            }

            selectShow.classList.toggle('_active');
            arrow.classList.toggle('_active');
            selectList.classList.toggle('_show-flex');
    
            if (!selectList.classList.contains('_show-flex')) {
                selectList.classList.add('_hide');
            } else {
                selectList.classList.remove('_hide');
            }
        })
    
        select.querySelectorAll('._select__item').forEach(item => {
            item.addEventListener('click', e => {
                selectShow.value = item.textContent.trim();

                // if (e.target === item.querySelector('input')) {
                //     // if (!selectList.classList.contains('_show-flex')) {
                //     //     selectList.classList.remove('_show-flex');
                //     //     selectList.classList.add('_hide');
                //     // }

                //     console.log(e.target)
                // }
            })
        })
    })
}

select(selects);

async function getApplications(listHtml, type) {
    const list = listHtml;

    return await fetch(`${BACKEND_URL}/${type}`)
    .then(res => res.json())
    .then(res => {
        res.forEach(elem => {
            list.innerHTML += `
                <li class="service__item">
                    <div class="service__status status-recently"></div>
                    <div class="service__date">
                        ${normalizeDate(elem?.date_start)} - ${normalizeDate(elem?.date_end)}
                    </div>
                    <div class="service__way">
                        <span class="service__way_item">
                            <img src="img/flag_ukraine.png" alt="">
                            <span>
                                ${elem?.from?.country}, ${elem?.from?.city}
                            </span>
                        </span>
                        <span class="service__way_item">
                            <img src="img/flag_belarus.png" alt="">
                            <span>
                            ${elem?.to?.country}, ${elem?.to?.city}
                            </span>
                        </span>
                    </div>
                    <div class="service__payment">
                        Запрос цены
                    </div>
                    <div class="service__transport">
                        ${elem?.transport}
                    </div>
                    <a href="${type}?id=${elem?.application_id}">
                    <button class="service__button button-grey">
                        Посмотреть
                    </button>
                    </a>
                    <a href="${type}?id=${elem?.application_id}">
                    <button class="service__button button-dark">
                        Связаться
                    </button>
                    </a>
                </li>
                `;
        })
    })
    .catch(() => {
        list.innerHTML = `<div class="text-center mt-1">Не найдено</div>`;
    })
}

let cargoList = document.querySelector('.cargo__list');
let tranposrtList = document.querySelector('.transport__list');

if (cargoList) {
    getApplications(cargoList, 'cargo');
}

if (tranposrtList) {
    getApplications(tranposrtList, 'transport');
}

const searchCargo = document.querySelector('.search-cargo');
const searchTransport = document.querySelector('.search-transport');

const catalogIndex = document.querySelector('.catalog__index');
const ApplicationListIndex = document.querySelector('#application__list_index');

if (searchCargo && searchTransport && catalogIndex) {
    const indexPageTitle = catalogIndex.querySelector('.index__page-title');

    searchCargo.addEventListener('click', () => {
        searchCargo.classList.add('_active');

        indexPageTitle.textContent = "Недавно добавленный груз";
        ApplicationListIndex.innerHTML = "";
        getApplications(ApplicationListIndex, 'cargo');

        removeClass(searchTransport, '_active');
    })

    searchTransport.addEventListener('click', () => {
        searchTransport.classList.add('_active');

        indexPageTitle.textContent = "Недавно добавленный транспорт";
        ApplicationListIndex.innerHTML = "";
        getApplications(ApplicationListIndex, 'transport');

        removeClass(searchCargo, '_active');
    })
}

const modal = document.querySelector('.modal');

// if (modal) {
    
// }

const headerBurgerFixed = document.querySelector('.header__burger-fixed');
const headerBrgerActive = document.querySelector('.header__burger_active');
const headerBurgerClose = document.querySelector('.header__burger_close');

function headerBurger(headerBurgerFixed, headerBrgerActive, headerBurgerClose) {
    if (!headerBrgerActive && !headerBurgerClose && !headerBurgerFixed) {
        return;
    }

    headerBrgerActive.addEventListener('click', () => {
        headerBurgerFixed.classList.add('_active');
    })

    headerBurgerClose.addEventListener('click', () => {
        removeClass(headerBurgerFixed, '_active');
    })

    headerBurgerFixed.addEventListener('click', e => {
        if (e.target !== headerBurgerFixed) {
            return;
        }

        removeClass(headerBurgerFixed, '_active');
    })
}

headerBurger(headerBurgerFixed, headerBrgerActive, headerBurgerClose);

class Calendar {
    constructor(calendarHtml, inputHtml, buttonShow) {
        this.calendarHtml = calendarHtml;
        this.yearHtml = calendarHtml.querySelector('.calendar__year_text');
        this.monthHtml = calendarHtml.querySelector('.calendar__month_text');
        this.calendarYearLeft = calendarHtml.querySelector('.calendar__year_left')
        this.calendarYearRight = calendarHtml.querySelector('.calendar__year_right');
        this.calendarMonthLeft = calendarHtml.querySelector('.calendar__month_left');
        this.calendarMonthRight = calendarHtml.querySelector('.calendar__month_right');
        this.daysHtml = calendarHtml.querySelectorAll('.calendar__day_item'); 
        this.inputHtml = inputHtml;
        this.buttonShow = buttonShow;
        this.day = new Date().getDate();
        this.months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        this.month = new Date().getMonth();
        this.year = new Date().getFullYear();
    }

    render() {
        this.yearHtml.textContent = this.year;
        this.monthHtml.textContent = this.months[this.month];

        this.days();
    }

    decrementYear() {
        this.calendarYearLeft.addEventListener('click', () => {
            this.year -= 1;
            this.render();
        });
    }

    incrementYear() {
        this.calendarYearRight.addEventListener('click', () => {
            this.year += 1;
            this.render();
        });
    }

    decrementMonth() {
        this.calendarMonthLeft.addEventListener('click', () => {
            this.month -= 1;

            if (this.month < 0) {
                this.month = 11;
            }

            this.render();
        });
    }

    incrementMonth() {
        this.calendarMonthRight.addEventListener('click', () => {
            this.month += 1;
            if (this.month > 11) {
                this.month = 0;
            }

            this.render();
        });
    }

    setInput = (day, disabled) => {
        if (!disabled) {
            return;
        }

        this.day = day;
        this.inputHtml.value = `${this.year}-${this.month+1}-${day}`;
        // console.log(`${this.year}-${this.month+1}-${day}`);
        return this.render();
    }

    show() {
        return this.buttonShow.addEventListener('click', () => {
            this.hideCalendars();
            this.calendarHtml.classList.toggle('display-block');
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

            if (day === 0) {
                day += 7;
            }

            this.daysHtml[i].textContent = new Date(this.year, this.month, i-day+2).getDate();

            removeClass(this.daysHtml[i], '_disabled');

            removeClass(this.daysHtml[i], '_active');

            if (this.day == this.daysHtml[i].textContent && this.month === new Date().getMonth() && this.year === new Date().getFullYear()) {
                this.daysHtml[i].classList.add('_active');
            }

            if (+this.daysHtml[i].textContent === 1) {
                disabled = false;
            }

            if (!disabled && firstOne && +this.daysHtml[i].textContent > 1) {
                firstOne = false;
            }

            if (this.daysHtml[i-1] && +this.daysHtml[i-1].textContent > +this.daysHtml[i].textContent && !firstOne) {
                disabled = true;
            }

            if (disabled) {
                this.daysHtml[i].classList.add('_disabled');
            }

            this.daysHtml[i].onclick = () => this.setInput(this.daysHtml[i].textContent, !this.daysHtml[i].classList.contains('_disabled'));
        }
    }

    hideCalendars() {
        return document.querySelectorAll('.calendar').forEach(elem => {
            if (elem !== this.calendarHtml) {
                removeClass(elem, 'display-block');
            }
        });
    }
    
    start() {
        this.render();

        this.decrementYear();
        this.incrementYear();
        this.decrementMonth();
        this.incrementMonth();

        this.show();
    }
}

if (document.querySelector('.calendar')) {
    const calendarStart = new Calendar(document.querySelector('.calendar'), document.querySelector('.date_start__input'), document.querySelector('.input-form__calendar'));
    calendarStart.start();
}

if (document.querySelectorAll('.calendar')[1]) {
    const calendarEnd = new Calendar(document.querySelectorAll('.calendar')[1], document.querySelector('.date_end__input'), document.querySelectorAll('.input-form__calendar')[1]);
    calendarEnd.start();
}

const loginButton = document.querySelector(".login__button");

function inputAcceptableLength(input, length) {
    return input.value.length >= length;
}

if (loginButton) {
    let login = document.querySelector('#login');
    let password = document.querySelector('#password');

    function setDisabledButton() {
        return loginButton.disabled = !(inputAcceptableLength(login, 5) && inputAcceptableLength(password, 5))
    }

    login.oninput = function() {
        setDisabledButton();
    }

    password.oninput = function() {
        setDisabledButton();
    }
}