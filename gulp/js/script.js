const urlQuery = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

const BACKEND_URL = `http://backend/http`;
const PATH_CONTENT = './source';
const PATH_IMAGE = `${PATH_CONTENT}/img`
const PATH_CONTENT_JS = `${PATH_CONTENT}/js/script.js`;
const LIMIT_OFFSET_APPLICATION = `&limit=10&offset=${pageApplicationOffset()}`;

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

    return function () {
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

function normalizeDate(date, haveYear = false) {
    let result = date.slice(5);
    result = result.slice(result.length - 2) + ' ' + monthShort[+result.slice(0, 2) - 1];
    
    if (haveYear) {
        result = ' ' + date.substr(date.length - 4);
    }

    return result;
}

function roundingMilliseconds(milliseconds) {
    return Math.round(milliseconds / 1000)
}

function normalizeDateSql(date) {
    let result = date.split(' ');
    result = `${result[2]}-${monthShort.indexOf(result[1])+1}-${result[0]}`;

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

        select.addEventListener('click', e => {
            if (e.pointerId <= -1) {
                return;
            }

            arrow.classList.toggle('_active');
            selectList.classList.toggle('_show-flex');

            if (!selectList.classList.contains('_show-flex')) {
                selectList.classList.add('_hide');
            } else {
                selectList.classList.remove('_hide');
            }
        })

        select.querySelectorAll('._select__item').forEach(item => {
            item.addEventListener('click', () => {
                selectShow.value = item.textContent.trim();
            })
        })
    })
}

select(selects);

const selectSearch = document.querySelectorAll('._select-search');

if (selectSearch) {
    selectSearch.forEach(select => {
        const selectInput = select.querySelector('._select-input');
        const selectSearchList = select.querySelector('._select-search__list')
        const selectItem = select.querySelectorAll('._select__item');

        selectInput.oninput = throttle(() => {
            let valueInput = selectInput.value;
            valueInput = valueInput.trim();
            valueInput = valueInput.toLowerCase();

            selectItem.forEach(elem => {
                let text = elem.textContent;
                text = text.trim();
                text = text.toLowerCase();

                if (valueInput.length < 1) {
                    elem.style.display = '';
                    removeClass(selectInput, '_active');
                    return;
                }

                selectInput.classList.add('_active');

                if (text.search(valueInput) === -1) {
                    elem.style.display = '';
                } else {
                    elem.style.display = 'block';
                }

                elem.addEventListener('click', e => {
                    if (e.pointerId <= -1) {
                        return;
                    }

                    selectInput.value = elem.textContent.trim();
                    selectItem.forEach(elem => elem.style.display = '');
                    removeClass(selectInput, '_active');
                })
            })

            selectInput.onblur = function() {
                setTimeout(() => {
                    selectItem.forEach(elem => elem.style.display = '');
                    selectSearchList.classList.add('border-0');
                    removeClass(selectInput, '_active');
                }, 100)
            }
        }, 500);
    })
}

function checkInputValue(elem) {
    return elem ? elem.value : null;
}

function applicationStatusColor(seconds) {
    if (seconds < 86400) {
        return 'status-recently';
    }

    if (seconds > 172800) {
        return 'status-48h';
    }

    return 'status-24h';
}

async function getApplications(listHtml, type, queryParams = null) {
    const list = listHtml;
    list.innerHTML = "";

    fetch(`${BACKEND_URL}/${type}/${queryParams}`)
    .then(res => res.json())
    .then(res => console.log(res))

    if (type == 'cargo') {
        return await fetch(`${BACKEND_URL}/${type}/${queryParams}`)
        .then(res => res.json())
        .then(res => {
            if (!res[0]) {
                list.innerHTML = `<div class="text-center mt-1">Не найдено</div>`;
            }
            res.forEach(elem => {
                list.innerHTML += `
                <li class="service__item">
                    <div class="service__status
                    ${applicationStatusColor(roundingMilliseconds(new Date() - new Date(elem?.date_created)))}
                    ">
                    </div>
                    <div class="service__date">
                        ${normalizeDate(elem?.date_start)} - ${normalizeDate(elem?.date_end)}
                    </div>
                    <div class="service__way">
                        <div class="service__way_item">
                            <img src="${PATH_IMAGE}/${showFlag(elem?.from?.country)}" alt="">
                            <span>
                                ${elem?.from?.city}
                            </span>
                        </div>
                        <div class="service__way_item">
                            
                            <img src="${PATH_IMAGE}/${showFlag(elem?.from?.country)}" alt="">
                            <span>
                                ${elem?.to?.city}
                            </span>
                        </div>
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

    if (type == 'transport') {
        return await fetch(`${BACKEND_URL}/${type}/${queryParams}`)
        .then(res => res.json())
        .then(res => {
            if (!res[0]) {
                list.innerHTML = `<div class="text-center mt-1">Не найдено</div>`;
            }
            res.forEach(elem => {
                list.innerHTML += `
                <li class="service__item">
                    <div class="service__status
                    ${applicationStatusColor(roundingMilliseconds(new Date() - new Date(elem?.date_created)))}
                    ">
                    </div>
                    <div class="service__date">
                        ${normalizeDate(elem?.date_start)} - ${normalizeDate(elem?.date_end)}
                    </div>
                    <div class="service__way">
                        <div class="service__way_item">
                            <img src="${PATH_IMAGE}/${showFlag(elem?.from?.country)}" alt="">
                            <span>
                                ${elem?.from?.city}
                            </span>
                        </div>
                        <div class="service__way_item">
                            
                            <img src="${PATH_IMAGE}/${showFlag(elem?.from?.country)}" alt="">
                            <span>
                                ${elem?.to?.city}
                            </span>
                        </div>
                    </div>
                    <div class="service__payment">
                        ${elem?.upload_type}
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
}

function setQueryParamsUrl(params) {
    return '?' + params.join('&');
}

function showFlag(country) {
    if (country == 'Россия') {
        return 'flag_russia.png';
    }

    if (country == 'Казахстан') {
        return 'flag_kazakhstan.png';
    }

    if (country == 'Белорусия') {
        return 'flag_belarus.png';
    }

    if (country == 'Украина') {
        return 'flag_ukraine.png';
    }
}

let cargoList = document.querySelector('.cargo__list');
let tranposrtList = document.querySelector('.transport__list');
const navigationBottom = document.querySelector('.navigation-bottom');

async function getCountElems(type) {
    let result = null

    const response = await fetch(`${BACKEND_URL}/count/?type=${type}`)
    .then(res => res.json())
    .then(res => result = res)
    .catch(err => console.log(err))

    return await result;
}

function renderNavigtaionBottom(elem, type) {
    let page = parseInt(urlQuery.p ? urlQuery.p : 1);

    let counter = Math.floor(page/10) * 10;

    elem.innerHTML = "";

    getCountElems(type).then(res => {
        let count = Math.floor(res.count / 10) * 10;

        if (!count) {
            return;
        }

        for (let i = 1 * counter; i <= count; i++) {
            if (i === 0) {
                continue;
            }

            if (i >= (+counter + 10)) {
                elem.innerHTML += `
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href _next_page" href="?p=${Math.floor(page/10 + 1)*10}">
                            Следующая страница
                        </a>
                    </li>
                `;
                break;
            }

            elem.innerHTML += `
                <li class="navigation-bottom_item">
                    <a class="navigation-bottom_href ${page == i ? '_active' : ''}" href="?p=${i}">
                        ${i}
                    </a>
                </li>
            `;
        }
    });
    // if (count > 10) {
    //     elem.innerHTML += `
    //         <li class="navigation-bottom_item">
    //             <a class="navigation-bottom_href">
    //                 ...
    //             </a>
    //         </li>
    //     `;
    // }
}

function pageApplicationOffset() {
    let page = urlQuery.p ? urlQuery.p : 1;

    if (page === 1 || page < 0) {
        return 0;
    }

    return 10;
}

const filterButton = document.querySelector('.filter__button');

function searchActiveButton(e) {
    e.preventDefault();
    
    const filter = document.querySelector('.filter');
    const filterFrom = filter.from;
    const filterTo = filter.to;
    const filterTransport_upload = checkInputValue(filter.transport_upload);
    const filterDateStart = checkInputValue(filter.date_start);
    const filterDateEnd = checkInputValue(filter.date_end);
    const filterUploadType = checkInputValue(filter.upload_type);
    const filterPriceMin = checkInputValue(filter.price_min);
    const filterPriceMax = checkInputValue(filter.price_max);
    const filterVolumeMin = checkInputValue(filter.volume_min);
    const filterVolumeMax = checkInputValue(filter.volume_max);
    const filterMassMin = checkInputValue(filter.mass_min);
    const filterMassMax = checkInputValue(filter.mass_max);

    let filterFromCheked = filterFrom[[...filterFrom].findIndex(elem => elem.checked)];
    let filterToCheked = filterTo[[...filterTo].findIndex(elem => elem.checked)];
    filterFromCheked = checkInputValue(filterFromCheked);
    filterToCheked = checkInputValue(filterToCheked);

    let queryParams = [
        filterFromCheked ? `from=${filterFromCheked}` : null,
        filterToCheked ? `to=${filterToCheked}` : null,
        filterTransport_upload ? `transport_upload=${filterTransport_upload}` : null,
        filterDateStart ? `date_start=${normalizeDateSql(filterDateStart)}` : null,
        filterDateEnd ? `date_end=${normalizeDateSql(filterDateEnd)}` : null,
        filterUploadType ? `upload_type=${filterUploadType}` : null,
        filterPriceMin ? `price_min=${filterPriceMin}` : null,
        filterPriceMax ? `price_max=${filterPriceMax}` : null,
        filterVolumeMin ? `volume_min=${filterVolumeMin}` : null,
        filterVolumeMax ? `volume_max=${filterVolumeMax}` : null,
        filterMassMin ? `mass_min=${filterMassMin}` : null,
        filterMassMax ? `mass_max=${filterMassMax}` : null
    ];

    queryParams = queryParams.filter(query => query != null);

    queryParams = setQueryParamsUrl(queryParams) + LIMIT_OFFSET_APPLICATION;

    // queryParams = '?' + queryParams.join('&') + LIMIT_OFFSET_APPLICATION;

    return getApplications(cargoList, 'cargo', queryParams);
}

function renderCargoList() {
    filterButton.onclick = searchActiveButton;
    
    getApplications(cargoList, 'cargo', LIMIT_OFFSET_APPLICATION);
}

function renderTransportList() {
    filterButton.onclick = searchActiveButton;
    
    getApplications(tranposrtList, 'transport', LIMIT_OFFSET_APPLICATION);
}

if (cargoList) {
    renderCargoList();

    renderNavigtaionBottom(navigationBottom, 'cargo');
}

if (tranposrtList) {
    renderTransportList();

    renderNavigtaionBottom(navigationBottom, 'transport');
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

        filterButton.onclick = e => {
            e.preventDefault();
        
            const filter = document.querySelector('.filter');
            const filterFrom = filter.from;
            const filterTo = filter.to;
            const filterTransport_upload = checkInputValue(filter.transport_upload);
            const filterDateStart = checkInputValue(filter.date_start);
            const filterDateEnd = checkInputValue(filter.date_end);
            const filterUploadType = checkInputValue(filter.upload_type);
            const filterPriceMin = checkInputValue(filter.price_min);
            const filterPriceMax = checkInputValue(filter.price_max);
            const filterVolumeMin = checkInputValue(filter.volume_min);
            const filterVolumeMax = checkInputValue(filter.volume_max);
            const filterMassMin = checkInputValue(filter.mass_min);
            const filterMassMax = checkInputValue(filter.mass_max);
        
            let filterFromCheked = filterFrom[[...filterFrom].findIndex(elem => elem.checked)];
            let filterToCheked = filterTo[[...filterTo].findIndex(elem => elem.checked)];
            filterFromCheked = checkInputValue(filterFromCheked);
            filterToCheked = checkInputValue(filterToCheked);
        
            let queryParams = [
                filterFromCheked ? `from=${filterFromCheked}` : null,
                filterToCheked ? `to=${filterToCheked}` : null,
                filterTransport_upload ? `transport_upload=${filterTransport_upload}` : null,
                filterDateStart ? `date_start=${filterDateStart}` : null,
                filterDateEnd ? `date_end=${filterDateEnd}` : null,
                filterUploadType ? `upload_type=${filterUploadType}` : null,
                filterPriceMin ? `price_min=${filterPriceMin}` : null,
                filterPriceMax ? `price_max=${filterPriceMax}` : null,
                filterVolumeMin ? `volume_min=${filterVolumeMin}` : null,
                filterVolumeMax ? `volume_max=${filterVolumeMax}` : null,
                filterMassMin ? `mass_min=${filterMassMin}` : null,
                filterMassMax ? `mass_max=${filterMassMax}` : null
            ];
        
            queryParams = queryParams.filter(query => query != null);
        
            queryParams = '?' + queryParams.join('&');
        
            return getApplications(cargoList, 'cargo', queryParams);
        };
    
        renderCargoList();

        removeClass(searchTransport, '_active');
    })

    searchTransport.addEventListener('click', () => {
        searchTransport.classList.add('_active');

        indexPageTitle.textContent = "Недавно добавленный транспорт";
        ApplicationListIndex.innerHTML = "";

        filterButton.onclick = e => {
            e.preventDefault();
        
            const filter = document.querySelector('.filter');
            const filterFrom = filter.from;
            const filterTo = filter.to;
            const filterTransport_upload = checkInputValue(filter.transport_upload);
            const filterDateStart = checkInputValue(filter.date_start);
            const filterDateEnd = checkInputValue(filter.date_end);
            const filterUploadType = checkInputValue(filter.upload_type);
            const filterPriceMin = checkInputValue(filter.price_min);
            const filterPriceMax = checkInputValue(filter.price_max);
            const filterVolumeMin = checkInputValue(filter.volume_min);
            const filterVolumeMax = checkInputValue(filter.volume_max);
            const filterMassMin = checkInputValue(filter.mass_min);
            const filterMassMax = checkInputValue(filter.mass_max);
        
            let filterFromCheked = filterFrom[[...filterFrom].findIndex(elem => elem.checked)];
            let filterToCheked = filterTo[[...filterTo].findIndex(elem => elem.checked)];
            filterFromCheked = checkInputValue(filterFromCheked);
            filterToCheked = checkInputValue(filterToCheked);
        
            let queryParams = [
                filterFromCheked ? `from=${filterFromCheked}` : null,
                filterToCheked ? `to=${filterToCheked}` : null,
                filterTransport_upload ? `transport_upload=${filterTransport_upload}` : null,
                filterDateStart ? `date_start=${filterDateStart}` : null,
                filterDateEnd ? `date_end=${filterDateEnd}` : null,
                filterUploadType ? `upload_type=${filterUploadType}` : null,
                filterPriceMin ? `price_min=${filterPriceMin}` : null,
                filterPriceMax ? `price_max=${filterPriceMax}` : null,
                filterVolumeMin ? `volume_min=${filterVolumeMin}` : null,
                filterVolumeMax ? `volume_max=${filterVolumeMax}` : null,
                filterMassMin ? `mass_min=${filterMassMin}` : null,
                filterMassMax ? `mass_max=${filterMassMax}` : null
            ];
        
            queryParams = queryParams.filter(query => query != null);
        
            queryParams = '?' + queryParams.join('&');
        
            return getApplications(ApplicationListIndex, 'transport', queryParams);
        };

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
        document.body.style.overflowY = 'hidden';
    })

    headerBurgerClose.addEventListener('click', () => {
        removeClass(headerBurgerFixed, '_active');
        document.body.style.overflowY = 'auto';
    })

    headerBurgerFixed.addEventListener('click', e => {
        if (e.target !== headerBurgerFixed) {
            return;
        }

        removeClass(headerBurgerFixed, '_active');
        document.body.style.overflowY = 'auto';
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

    setInput = (day, disabled) => {
        if (!disabled) {
            return;
        }

        this.day = day;
        this.inputHtml.value = `${day} ${monthShort[this.month]} ${this.year}`;
        removeClass(this.calendarHtml, 'display-block');
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

            this.daysHtml[i].textContent = new Date(this.year, this.month, i - day + 2).getDate();

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

            if (this.daysHtml[i - 1] && +this.daysHtml[i - 1].textContent > +this.daysHtml[i].textContent && !firstOne) {
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

const calendarFirst = document.querySelector('.calendar');
const calendarSecond = document.querySelectorAll('.calendar')[1];

if (calendarFirst) {
    const calendarStart = new Calendar(calendarFirst, document.querySelector('.date_start__input'), document.querySelector('.input-form__calendar'));
    calendarStart.start();
}

if (calendarSecond) {
    const calendarEnd = new Calendar(calendarSecond, document.querySelector('.date_end__input'), document.querySelectorAll('.input-form__calendar')[1]);
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

    login.oninput = function () {
        setDisabledButton();
    }

    password.oninput = function () {
        setDisabledButton();
    }
}

document.body.addEventListener('click', e => {
    if (selects) {
        selects.forEach(select => {
            const selectShow = select.querySelector('._select__show');
            const selectArrow = select.querySelector('._select__arrow');
            const selectList = select.querySelector('._select__list');

            if (e.target == selectShow) {
                return;
            }

            if (e.target == selectArrow) {
                return;
            }

            if (selectShow.classList.contains('_active')) {
                selectShow.classList.remove('_active');
                selectArrow.classList.remove('_active');
            }

            if (selectList.classList.contains('_show-flex')) {
                selectList.classList.remove('_show-flex');
                selectList.classList.add('_hide');
            }
        })
    }

    // if (calendarFirst && calendarSecond) {
    //     const сalendarForm = document.querySelectorAll('.calendar-form');

    //     сalendarForm.forEach(form => {
    //         const calendar = form.querySelector('.calendar');
    //         const buttonCalendar = form.querySelector('.input-form__calendar.button-dark');
    //         const buttonSvg = buttonCalendar.querySelector('svg');

    //         console.log(e.target)

    //         if (e.target == buttonCalendar || e.target == buttonSvg) {
    //             return;
    //         }

    //         if (calendar.classList.contains('display-block')) {
    //             calendar.classList.remove('display-block');
    //         }
    //     })
    // }
}, false)