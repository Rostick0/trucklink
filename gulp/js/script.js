const urlQuery = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

const BACKEND_URL = `${window.location.origin}/http`;
const PATH_CONTENT = './source/static';
const PATH_IMAGE = `${PATH_CONTENT}/img`
const PATH_CONTENT_JS = `${PATH_CONTENT}/js`;
const LIMIT_OFFSET_APPLICATION = `&limit=10&offset=${pageApplicationOffset()}`;
const LIMIT_OFFSET_MIN = `&limit=10&offset=0`;

const switchThemeSwitch = document.querySelector('.switch-theme__switch');

function smoothTransitionTheme() {
    const style = window.document.styleSheets[0];

    const css = `* {
        -webkit-transition: 500ms !important;
        -o-transition: 500ms !important;
        transition: 500ms !important;
    }`.trim();

    if (style.cssRules[style.cssRules.length - 1].selectorText == '*') {
        return;
    }

    style.insertRule(css, style.cssRules.length);
    const index = style.cssRules.length - 1;

    setTimeout(() => {
        style.deleteRule(index);
    }, 500);
}

const svgs = {
    moon: `<svg width="0.875rem" height="1rem" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.935 7.793A5.937 5.937 0 0 0 .989 1.94 7.633 7.633 0 0 1 5.935.126c4.228 0 7.667 3.44 7.667 7.667 0 4.228-3.44 7.667-7.667 7.667a7.633 7.633 0 0 1-4.946-1.814 5.937 5.937 0 0 0 4.946-5.853zm0 6.183a6.19 6.19 0 0 0 6.183-6.183A6.19 6.19 0 0 0 5.935 1.61c-.526 0-1.047.068-1.55.199a7.421 7.421 0 0 1 0 11.969 6.154 6.154 0 0 0 1.55.198z" fill="#1A68AA"/><path d="M5.935 7.793A5.937 5.937 0 0 0 .989 1.94 7.633 7.633 0 0 1 5.935.126c4.228 0 7.667 3.44 7.667 7.667 0 4.228-3.44 7.667-7.667 7.667a7.633 7.633 0 0 1-4.946-1.814 5.937 5.937 0 0 0 4.946-5.853zm0 6.183a6.19 6.19 0 0 0 6.183-6.183A6.19 6.19 0 0 0 5.935 1.61c-.526 0-1.047.068-1.55.199a7.421 7.421 0 0 1 0 11.969 6.154 6.154 0 0 0 1.55.198z" stroke="#1A68AA"/></svg>`,
    sun: `<svg width="1.375rem" height="1.375rem" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.5 16.5 18 18l-1.5-1.5zM19 11h2-2zM5.5 5.5 4 4l1.5 1.5zm11 0L18 4l-1.5 1.5zm-11 11L4 18l1.5-1.5zM1 11h2-2zM11 1v2-2zm0 18v2-2zm4-8a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" stroke="#FFA61B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
}

if (switchThemeSwitch) {
    const switchThemeIcon = document.querySelector('.switch-theme__icon');

    if (localStorage.getItem('theme') === '_dark') {
        switchThemeSwitch.classList.toggle('_active');
        document.body.classList.toggle('_dark');
        switchThemeIcon.innerHTML = svgs.moon;
    }

    switchThemeSwitch.onclick = () => {
        smoothTransitionTheme();

        switchThemeSwitch.classList.toggle('_active');
        document.body.classList.toggle('_dark');

        if (localStorage.getItem('theme') === '_dark') {
            localStorage.setItem('theme', '');
            switchThemeIcon.innerHTML = svgs.sun;
        } else {
            localStorage.setItem('theme', '_dark');
            switchThemeIcon.innerHTML = svgs.moon;
        }
    }
}

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
    result = `${result[2]}-${monthShort.indexOf(result[1]) + 1}-${result[0]}`;

    return result;
}

function validateEmail(email) {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};


function setAnimation(elem, determinantProperty, showProperty = 'd-flex', hideProperty = '_hide', duration = 500) {
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

function reverseString(string) {
    return [...string].reverse().join('');
}

function SpacesMumbers(price, lengthBetweenSpaces = 3) {
    if (typeof price === 'number') {
        price = price.toString();
    }

    let result = '';

    price = '0' + reverseString(price);

    for (let i = 1; i < price.length; i++) {
        result += price[i];

        if (i === 0) {
            continue;
        }

        if (i % lengthBetweenSpaces === 0) {
            result += ' ';
        }
    }

    result = reverseString(result)
    result = result.trim()

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

            setAnimation(selectList);
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
        const selectItem = select.querySelectorAll('._select__item');
        const selectSearchList = select.querySelector('._select-search__list');

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
            });

            selectSearchList.classList.add('_show-flex');

            selectInput.onblur = function () {
                setTimeout(() => {
                    selectItem.forEach(elem => elem.style.display = '');
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

async function removeApplication(id) {
    const serviceItem = document.querySelector(`.service__item[data-id="${id}"]`);

    return fetch(`${BACKEND_URL}/application?id=${id}`, {
        method: "DELETE"
    })
        .then(res => {
            if (res.status >= 200 && res.status < 300) {
                return res.json()
            }
        })
        .then(() => {
            serviceItem.remove();
        })
}

async function getApplications(listHtml, type, queryParams = null, clear = true, isEdit = false, htmlForEmpty = '<div class="text-center mt-1">Не найдено</div>') {
    const list = listHtml;

    if (clear) {
        list.innerHTML = "";
    }

    if (type == 'cargo') {
        return await fetch(`${BACKEND_URL}/${type}/${queryParams}`)
            .then(res => {
                if (res.status >= 200 && res.status < 300) {
                    return res.json();
                }

                throw error;
            })
            .then(res => {
                if (res[0]) {
                    res.forEach(elem => applicationHtml(list, elem, true, isEdit));
                }
            })
            .catch(() => {
                list.insertAdjacentHTML('beforeend', htmlForEmpty);
            })
    }

    if (type == 'transport') {
        return await fetch(`${BACKEND_URL}/${type}/${queryParams}`)
            .then(res => {
                if (res.status >= 200 && res.status < 300) {
                    return res.json();
                }

                throw error;
            })
            .then(res => {
                if (res[0]) {
                    res.forEach(elem => applicationHtml(list, elem, false, isEdit));
                }
            })
            .catch(() => {
                list.insertAdjacentHTML('beforeend', htmlForEmpty);
            })
    }
}

function applicationHtml(list, elem, isCargo = null, isEdit = null) {
    return list.insertAdjacentHTML('beforeend',
        `<li class="service__item" data-id="${elem?.application_id}">
            <div class="service__status
            ${applicationStatusColor(roundingMilliseconds(new Date() - new Date(elem?.date_created)))}
            ">
            </div>
             <div class="service__date">
                ${normalizeDate(elem?.date_start)} - ${normalizeDate(elem?.date_end)}
            </div>
            <div class="service__way">
                <div class="service__way_item">
                    <img class="flag-img" src="${PATH_IMAGE}/${showFlag(elem?.from?.country)}" alt="${elem?.from?.country}">
                    <span>
                        ${elem?.from?.city}
                    </span>
                </div>
                <div class="service__way_item">
                    <img class="flag-img" src="${PATH_IMAGE}/${showFlag(elem?.to?.country)}" alt="${elem?.to?.country}">
                    <span>
                        ${elem?.to?.city}
                    </span>
                </div>
            </div>
            <div class="service__payment">
                ${isCargo ? (elem?.price ? SpacesMumbers(elem?.price, 3) + ' &#8381;' : "Запрос цены") : elem?.upload_type}
            </div>
            <div class="service__transport">
                ${elem?.transport}
            </div>
            ${isEdit ?
            `
                ${elem?.my_application ? `
                    <a href="application_edit?id=${elem?.application_id}">
                        <svg width="1.25rem" height="1.25rem" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99967 3.33337H5.33301C4.22844 3.33337 3.33301 4.2288 3.33301 5.33337V14.6667C3.33301 15.7713 4.22844 16.6667 5.33301 16.6667H14.6663C15.7709 16.6667 16.6663 15.7713 16.6663 14.6667V10M7.49967 12.5V10.4167L14.7913 3.12504C15.3666 2.54974 16.2994 2.54974 16.8747 3.12504V3.12504C17.45 3.70034 17.45 4.63308 16.8747 5.20837L12.9163 9.16671L9.58301 12.5H7.49967Z" stroke="var(--default-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>            
                    </a>
                    <button onclick="removeApplication(${elem?.application_id})">
                        <svg width="1.125rem" height="1.125rem" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 5.625L13.5 14.625M13.5 5.625L4.5 14.625" stroke="#E94141" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                `
                :
                '<div></div>'.repeat(2)}
            
            `
            :
            `<a href="${isCargo ? 'cargo' : 'transport'}?id=${elem?.application_id}">
                <button class="service__button button-grey">
                    Посмотреть
                </button>
            </a>
            <a href="${isCargo ? 'cargo' : 'transport'}?id=${elem?.application_id}">
                <button class="service__button button-dark">
                    Связаться
                </button>
            </a>`
        }
        </li>`);
}

function setQueryParamsUrl(params) {
    return '?' + params.join('&');
}

function inputAcceptableLength(input, length) {
    return input.value.trim().length > length;
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

async function getCountElems(queryParams) {
    let result = null

    const response = await fetch(`${BACKEND_URL}/count/${queryParams}`)
        .then(res => res.json())
        .then(res => result = res)
        .catch(err => console.log(err))

    return await result;
}

function removeURLParameter(url, parameter) {
    let urlparts = url.split('?');
    if (urlparts.length >= 2) {
        let prefix = encodeURIComponent(parameter) + '=';
        let pars = urlparts[1].split(/[&;]/g);

        for (let i = pars.length; i-- > 0;) {
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
    }
    return url;
}

function renderNavigtaionBottom(queryParams) {
    const navigationBottom = document.querySelector('.navigation-bottom');

    if (!navigationBottom) {
        return;
    }

    let page = parseInt(urlQuery.p ? urlQuery.p : 1);

    let counter = Math.floor(page / 10) * 10;

    navigationBottom.innerHTML = "";

    getCountElems(queryParams).then(res => {
        let count = Math.floor(res.count / 10 + 1);
        let editedUrl = removeURLParameter(document.URL, 'p');
        editedUrl = new URL(editedUrl);
        editedUrl = editedUrl.search;
        editedUrl = editedUrl.substring(1);
        editedUrl = editedUrl ? '&' + editedUrl : '';

        if (!count) {
            return;
        }

        for (let i = 1 * counter; i <= count; i++) {
            if (i === 0) {
                continue;
            }

            if (count === 1) {
                break;
            }

            if (i >= (+counter + 10)) {
                navigationBottom.innerHTML += `
                    <li class="navigation-bottom_item">
                        <a class="navigation-bottom_href _next_page" href="?p=${Math.floor(page / 10 + 1) * 10}${editedUrl}">
                            Следующая страница
                        </a>
                    </li>
                `;
                break;
            }

            navigationBottom.innerHTML += `
                <li class="navigation-bottom_item">
                    <a class="navigation-bottom_href ${page == i ? '_active' : ''}" href="?p=${i}${editedUrl}">
                        ${i}
                    </a>
                </li>
            `;
        }
    });
}

function pageApplicationOffset() {
    let page = urlQuery.p ? urlQuery.p : 1;

    if (page < 0) {
        return 0;
    }

    return 10 * (page - 1);
}

const catalogFilter = document.querySelector('.catalog__filter');
const filterButton = document.querySelector('.filter__button');
const filterResetButton = document.querySelector('.filter__reset-button');

if (catalogFilter) {
    const inputs = catalogFilter.querySelectorAll('input[type="text"], input[type="number"]');
    const dateStartInput = catalogFilter.querySelector('.date_start__input');
    const dateEndInput = catalogFilter.querySelector('.date_end__input');

    catalogFilter.onclick = () => {
        if (inputAcceptableLength(dateStartInput, 0)) {
            filterButton.disabled = false;
            return;
        }

        if (inputAcceptableLength(dateEndInput, 0)) {
            filterButton.disabled = false;
            return;
        }
    }

    catalogFilter.oninput = throttle(() => {
        filterButton.disabled = ![...inputs].some(input => {
            return inputAcceptableLength(input, 0);
        });
    }, 100)


    filterResetButton.addEventListener('click', () => {
        inputs.forEach(input => input.value = '');
        filterButton.disabled = true;
        window.history.pushState({}, document.title, window.location.pathname + (urlQuery.type === 'transport' ? '?type=transport' : ''));
    })
}

function searchActiveButton(htmlElem, type) {
    return function (e) {
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

        queryParams = setQueryParamsUrl(queryParams);

        queryParams = window.location.search + (window.location.search ? '&' : '?') + queryParams.substring(1);

        window.history.pushState({}, null, queryParams);

        queryParams += LIMIT_OFFSET_APPLICATION;

        renderNavigtaionBottom(`${queryParams}&type=${type}`);

        return getApplications(htmlElem, type, queryParams);
    }
}

function setFilterButton(htmlElem, type) {
    if (!filterButton) {
        return;
    }

    return filterButton.onclick = searchActiveButton(htmlElem, type);
}

function renderCargoList() {
    if (urlQuery.type == "transport") {
        return;
    }

    setFilterButton(cargoList, 'cargo');

    getApplications(cargoList, 'cargo', window.location.search + LIMIT_OFFSET_APPLICATION);

    renderNavigtaionBottom(window.location.search + '&type=cargo');
}

function renderApplicationList(listHtml, type) {
    setFilterButton(listHtml, type);

    getApplications(listHtml, type, window.location.search + LIMIT_OFFSET_APPLICATION);

    renderNavigtaionBottom(window.location.search + `&type=${type}`);
}

if (cargoList) {
    if (urlQuery.type != "transport") {
        renderApplicationList(cargoList, 'cargo');
    }
}

if (tranposrtList) {
    renderApplicationList(tranposrtList, 'transport');
}




const searchCargo = document.querySelector('.search-cargo');
const searchTransport = document.querySelector('.search-transport');

const catalogIndex = document.querySelector('.catalog__index');
const ApplicationListIndex = document.querySelector('#application__list_index');

if (searchCargo && searchTransport && catalogIndex) {
    const indexPageTitle = catalogIndex.querySelector('.index__page-title__selected');
    const tableServiceNameFourth = catalogIndex.querySelector('.table__service_name:nth-child(4)');

    function setFilterResetButton(listHtml, type) {
        filterResetButton.onclick = throttle(() => {
            getApplications(listHtml, type, LIMIT_OFFSET_MIN);

            renderNavigtaionBottom(`&type=${type}`);

            const navigationBottomHref = document.querySelectorAll('.navigation-bottom_href');

            if (!navigationBottomHref[0]) {
                return;
            }

            navigationBottomHref.forEach(elem => removeClass(elem, '_active'));

            navigationBottomHref[0].classList.add('_active');
        }, 400);
    }

    setFilterResetButton(cargoList, 'cargo');

    searchCargo.addEventListener('click', () => {
        searchCargo.classList.add('_active');

        indexPageTitle.textContent = "груз";
        tableServiceNameFourth.textContent = "Оплата";

        filterButton.onclick = searchActiveButton(cargoList, 'cargo');
        setFilterResetButton(cargoList, 'cargo');

        renderApplicationList(cargoList, 'cargo');

        removeClass(searchTransport, '_active');

        window.history.pushState({}, document.title, window.location.pathname);
    })

    function indexCatalogTranposrt() {
        searchTransport.classList.add('_active');

        indexPageTitle.textContent = "транспорт";
        tableServiceNameFourth.textContent = "Тип загрузки";

        filterButton.onclick = searchActiveButton(ApplicationListIndex, 'transport');
        setFilterResetButton(ApplicationListIndex, 'transport');

        renderApplicationList(ApplicationListIndex, 'transport')

        removeClass(searchCargo, '_active');
    }

    if (urlQuery.type == "transport") {
        indexCatalogTranposrt();
    }

    searchTransport.addEventListener('click', () => {
        indexCatalogTranposrt();
        window.history.pushState({}, null, window.location.pathname + '?type=transport');
    });
}

const modal = document.querySelector('.modal');

if (modal) {
    const modalClose = modal.querySelector('.modal__close');

    modal.addEventListener('click', e => {
        if (e.target === modal || e.target === modalClose) {
            removeClass(modal, '_active');
            return;
        }
    })
}

const headerBurgerFixed = document.querySelector('.header__burger-fixed');
const headerBrgerActive = document.querySelector('.header__burger_active');
const headerBurgerClose = document.querySelector('.header__burger_close');

function headerBurger(headerBurgerFixed, headerBrgerActive, headerBurgerClose) {
    if (!headerBrgerActive && !headerBurgerClose && !headerBurgerFixed) {
        return;
    }

    headerBrgerActive.addEventListener('click', () => {
        headerBurgerFixed.classList.add('_active');
        document.body.classList.add('_hidden-scroll');
    })

    headerBurgerClose.addEventListener('click', () => {
        removeClass(headerBurgerFixed, '_active');
        removeClass(document.body, '_hidden-scroll');
    })

    headerBurgerFixed.addEventListener('click', e => {
        if (e.target !== headerBurgerFixed) {
            return;
        }

        removeClass(headerBurgerFixed, '_active');
        removeClass(document.body, '_hidden-scroll');
    })
}

headerBurger(headerBurgerFixed, headerBrgerActive, headerBurgerClose);

class Calendar {
    constructor(calendarHtml, inputHtml, buttonShow) {
        this.calendarHtml = calendarHtml;
        this.monthHtml = calendarHtml.querySelector('.calendar__month_text');
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

            setAnimation(this.calendarHtml, 'display-block', 'd-block');
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

            let date = new Date(this.year, this.month, i - day + 2)

            this.daysHtml[i].textContent = date.getDate();

            removeClass(this.daysHtml[i], '_disabled');

            removeClass(this.daysHtml[i], '_active');

            if (this.day == this.daysHtml[i].textContent && this.month === new Date().getMonth() && this.year === new Date().getFullYear()) {
                this.daysHtml[i].classList.add('_active');
            }

            if (+this.daysHtml[i].textContent === 1) {
                disabled = false;
            }

            this.lockBeforeAndAfter(this.daysHtml[i], date);

            if (!disabled && firstOne && +this.daysHtml[i].textContent > 1) {
                firstOne = false;
            }

            if (this.daysHtml[i - 1] && +this.daysHtml[i - 1].textContent > +this.daysHtml[i].textContent && !firstOne) {
                disabled = true;
            }

            if (disabled) {
                this.daysHtml[i].classList.add('_disabled');
            }

            this.daysHtml[i].onclick = () => {
                this.setInput(this.daysHtml[i].textContent, !this.daysHtml[i].classList.contains('_disabled'));
                this.hideCalendars();
                setAnimation(this.calendarHtml, 'display-block', 'd-block');
            }
        }
    }

    lockBeforeAndAfter(dayHtml, date) {
        if (this.inputHtml == dateStartInput) {
            if (!dateEndInput.value) {
                return;
            }

            if (new Date(normalizeDateSql(dateEndInput.value)) >= date) {
                return;
            }

            return dayHtml.classList.add('_disabled');
        }

        if (!dateStartInput.value) {
            return;
        }

        if (new Date(normalizeDateSql(dateStartInput.value)) <= date) {
            return;
        }

        return dayHtml.classList.add('_disabled');
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

        this.decrementMonth();
        this.incrementMonth();

        this.show();
    }
}

const calendarFirst = document.querySelector('.calendar');
const calendarSecond = document.querySelectorAll('.calendar')[1];
const dateStartInput = document.querySelector('.date_start__input');
const dateEndInput = document.querySelector('.date_end__input');

if (calendarFirst) {
    const calendarStart = new Calendar(calendarFirst, dateStartInput, document.querySelector('.calendar-from__active'));
    calendarStart.start();

    dateStartInput.onclick = () => {
        if (!dateEndInput.value) {
            return;
        }

        calendarStart.render();
    }
}

if (calendarSecond) {
    const calendarEnd = new Calendar(calendarSecond, dateEndInput, document.querySelectorAll('.calendar-from__active')[1]);
    calendarEnd.start();

    dateEndInput.onclick = () => {
        if (!dateStartInput.value) {
            return;
        }

        calendarEnd.render();
    }
}

const login = document.querySelector('.login');

if (login) {
    const loginInput = login.querySelector('#login');
    const passwordInput = login.querySelector('#password');

    const loginButton = login.querySelector('.login__button');

    login.oninput = throttle(() => {
        if (!inputAcceptableLength(loginInput, 2)) {
            return loginButton.disabled = true;
        }

        if (!inputAcceptableLength(passwordInput, 4)) {
            return loginButton.disabled = true;
        }

        return loginButton.disabled = false;
    }, 100);
}

const registration = document.querySelector('.registration');

if (registration) {
    const emailInput = registration.querySelector('#user_email');
    const telephoneInput = registration.querySelector('#user_telephone');
    const loginInput = registration.querySelector('#user_login');
    const nameInput = registration.querySelector('#user_name');
    const passwordInput = registration.querySelector('#user_password');
    const passwordConfirmInput = registration.querySelector('#user_password_confirm');
    const registrationButton = registration.querySelector('.registration__button');

    registration.oninput = throttle(() => {
        if (!inputAcceptableLength(emailInput, 3)) {
            return registrationButton.disabled = true;
        }

        if (!inputAcceptableLength(telephoneInput, 3)) {
            return registrationButton.disabled = true;
        }

        if (!inputAcceptableLength(loginInput, 3)) {
            return registrationButton.disabled = true;
        }

        if (!inputAcceptableLength(nameInput, 3)) {
            return registrationButton.disabled = true;
        }

        if (!inputAcceptableLength(passwordInput, 4)) {
            return registrationButton.disabled = true;
        }

        if (passwordInput.value != passwordConfirmInput.value) {
            return registrationButton.disabled = true;
        }

        return registrationButton.disabled = false;
    }, 100);
}

const information = document.querySelector('.information');

if (information) {
    const price = document.querySelector('#price');
    const hasPrice = document.querySelector('#has_price');

    function disabledPrice() {
        if (hasPrice.checked) {
            return price.disabled = true;
        }
    }

    disabledPrice();

    hasPrice.onchange = () => {
        disabledPrice();

        return price.disabled = false;
    }
}

const myApplicationList = document.querySelector('.my-application__list');
const myApplicationListSecond = document.querySelectorAll('.my-application__list')[1];
const myCargoList = document.querySelector('.my_cargo__list');
const myTransportList = document.querySelector('.my_transport__list');

function MyApplictaionScrollListener(listHtml, type) {
    fetch(`${BACKEND_URL}/count?type=${type}&my_application=true`)
        .then(res => res.json())
        .then(res => {
            let count = 10;

            myApplicationList.addEventListener('scroll', throttle(async function () {
                if (res.count < count) {
                    return;
                }

                if (this.scrollHeight - this.offsetHeight > this.scrollTop * 1.33) {
                    return;
                }

                getApplications(listHtml, type, LIMIT_OFFSET_APPLICATION + count + "&user_id=" + urlQuery.id, false, true);

                count += 10;
            }, 500));
        })
}

if (myApplicationList) {
    MyApplictaionScrollListener(myCargoList, 'cargo');
}

if (myApplicationListSecond) {
    MyApplictaionScrollListener(myTransportList, 'transport');
}

if (myCargoList && myTransportList) {
    function myHtmlForEmpty(link) {
        return `<li class="service__item">
            <div class="service__status status-recently"></div>
            <a class="service__item_create" href="${link}">
                <span>${link === '/add-cargo' ? 'Добавить груз' : 'Добавить транспорт'}</span>
                <svg width="1.15rem" height="1.15rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.2913 2.375H5.95801C4.85344 2.375 3.95801 3.27043 3.95801 4.375V14.625C3.95801 15.7296 4.85344 16.625 5.95801 16.625H13.0413C14.1459 16.625 15.0413 15.7296 15.0413 14.625V7.125M10.2913 2.375L15.0413 7.125M10.2913 2.375V6.125C10.2913 6.67728 10.7391 7.125 11.2913 7.125H15.0413M9.49967 10.2917V13.4583M11.083 11.875H7.91634" stroke="var(--default-color)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </li>`.repeat(4);
    }

    getApplications(myCargoList, 'cargo', LIMIT_OFFSET_APPLICATION + "&user_id=" + urlQuery.id, false, true, myHtmlForEmpty('/add-cargo'));
    getApplications(myTransportList, 'transport', LIMIT_OFFSET_APPLICATION + "&user_id=" + urlQuery.id, false, true, myHtmlForEmpty('/add-transport'));
}

const accountCardImage = document.querySelector('.account-card__image');

if (accountCardImage) {
    const userAvatar = document.querySelector('#user_avatar');

    userAvatar.onchange = function () {
        const formData = new FormData();

        formData.append('avatar', this.files[0]);

        return fetch(`${BACKEND_URL}/avatar`, {
            method: 'POST',
            body: formData,
        })
            .then(res => {
                if (res.status >= 200 && res.status < 300) {
                    return res.json();
                }

                throw err;
            })
            .then(res => {
                if (res.path) {
                    accountCardImage.innerHTML = `<img class="account-card__img" src="${res.path}" alt="">
                                                <div class="account-card__image-update">
                                                    <p>Нажмите, чтобы</p>
                                                    <p>обновить фотографию</p>
                                                </div>`;
                }
            })
            .catch(err => console.log(err))
    }
}

const clientContactNumber = document.querySelector('.client__contact_number');

if (clientContactNumber) {
    let showClientContactNumber = false;

    clientContactNumber.onclick = () => {
        if (showClientContactNumber) {
            return;
        }

        showClientContactNumber = true;

        clientContactNumber.innerHTML = `<div class="_show">${clientContactNumber.getAttribute('data-tel')}</div>`;
    };
}

const socket = new WebSocket("ws://127.0.0.1:2346");

socket.onopen = function () {

};

socket.onclose = function (event) {
    if (event.wasClean) {
        console.log('Соединение закрыто чисто');
    } else {
        console.log('Обрыв соединения');
    }
    console.log('Код: ' + event.code + ' причина: ' + event.reason);
};

socket.onerror = function (error) {
    console.log("Ошибка " + error.message);
};

const messageSend = document.querySelector('.message__send');
const messageList = document.querySelector('.message__list');

if (messageSend && messageList) {
    const messageInput = messageSend.querySelector('.message__input');
    const messageButton = messageSend.querySelector('.message__button');

    function isnertMessageItem(elem, text, date_created, form_me = null, whereCreate = 'beforeend') {
        return elem.insertAdjacentHTML(whereCreate, `
        <li class="message__item ${form_me ? 'message__item_from-me' : ''}">
            
            <div class="message__text">
                <div class="message-message">
                ${text}
                </div>
                <date class="message__date">
                    ${date_created}
                </date>
            </div>
        </li>`);
    }

    let offset = 0;

    renderMessageItem(offset)

    function renderMessageItem(offset) {
        return fetch(`${BACKEND_URL}/message?user_first=${urlQuery.id}&limit=50&offset=${offset}`)
        .then(res => {
            if (res.status >= 200 && res.status < 300) {
                return res.json();
            }

            throw err;
        })
        .then(res => {
            if (res[0]) {
                res.forEach(data => isnertMessageItem(messageList, data.text, data.date_created, data.from_me));
            }
        })
    }

    messageList.addEventListener('scroll', throttle(async function () {
        if (this.scrollHeight - this.offsetHeight < this.scrollTop * 1.15) {
            return;
        }

        offset += 50;

        renderMessageItem(offset)
    }, 750));

    messageButton.onclick = () => {
        const data = {
            user_to: urlQuery.id,
            text: messageInput.value
        };

        socket.send(JSON.stringify(data));

        messageInput.value = '';
    }

    socket.onmessage = function (event) {
        const data = JSON.parse(event.data);
        fetch(`${BACKEND_URL}/session?type=id`)
            .then(res => {
                if (res.status >= 200 && res.status < 300) {
                    return res.json();
                }

                throw err;
            })
            .then(res => {
                const user_id = res.user_id;

                if (!((urlQuery.id == data.user_to && user_id == data.user_from) || (urlQuery.id == data.user_from && user_id == data.user_to))) {
                    return;
                }

                console.log(data);

                let fromMe = false;

                if (urlQuery.id == data.user_to) {
                    fromMe = true;
                }

                isnertMessageItem(messageList, data.text, data.date_created, fromMe, 'afterbegin');
            })
    };
}

const chatList = document.querySelector('.chat__list');

function maxLenMessage(message, len) {
    if (message.length < len) {
        return message;
    }

    return message.slice(0, len) + '...'
}

if (chatList) {
    let offset = 0;

    function chatItemRender(offset) {
        fetch(`${BACKEND_URL}/chat?limit=20&offset=${offset}`)
        .then(res => {
            if (res.status >= 200 && res.status < 300) {
                return res.json();
            }

            throw err;
        })
        .then(res => {
            if (res[0]) {
                res.forEach(elem => {
                    chatList.insertAdjacentHTML('beforeend', `
                    <li class="chat__item">
                        <a href="/chat?id=${elem?.user_id}">
                            <div class="chat__image ${elem?.is_online == 1 ? '_online' : ''}">
                                ${elem?.avatar
                                    ?
                                    `<img class="avatar__img" src="./source/upload/${elem?.avatar}" alt="${elem?.name}">'`
                                    :
                                    `<div class="avatar__icon avatar__icon">${elem?.name[0]}</div>`
                                }
                            </div>
                            <div class="chat__text">
                                <div class="chat__user-name">
                                ${elem?.name}
                                </div>
                                <div class="chat__user-message">
                                    ${maxLenMessage(elem?.last_message?.text, 15)}
                                </div>
                            </div>
                        </a>
                    </li>
                    `);
                })
            }
        })
    }

    chatItemRender(offset);

    chatList.addEventListener('scroll', throttle(async function () {
        if (this.scrollHeight - this.offsetHeight < this.scrollTop * 1.15) {
            return;
        }

        offset += 20;

        chatItemRender(offset)
    }, 750));
}

function escapeHtmlNull(text) {
    return text
        .replace(/&/g, "")
        .replace(/</g, "[")
        .replace(/>/g, "]")
        .replace(/"/g, "`")
        .replace(/'/g, "`");
}

const support = document.querySelector('.support');

if (support) {
    function sendMessage() {
        const supportButtonSubmit = support.querySelector('.support__button-submit');

        let timeoutLockSend = Date.now() + 1000 * 3;

        supportButtonSubmit.addEventListener('click', async function (e) {
            e.preventDefault();

            if (timeoutLockSend > Date.now()) {
                return;
            }

            let err = false;

            let userName = support.querySelector('#user_name');
            let userEmail = support.querySelector('#user_email');
            let userMessage = support.querySelector('#user_message');

            let userNameError = support.querySelector('#userNameError') ? support.querySelector('#userNameError') : null;
            let userEmailError = support.querySelector('#userEmailError') ? support.querySelector('#userEmailError') : null;
            let userMessageError = support.querySelector('#userMessageError') ? support.querySelector('#userMessageError') : null;

            let userNameValue = userName.value.trim();
            let userEmailValue = userEmail.value.trim();
            let userMessageValue = userMessage.value.trim();

            let timeoutSupport = localStorage.getItem('timeout_support') ? localStorage.getItem('timeout_support') : Date.now();
            timeoutSupport = parseInt(timeoutSupport);

            if (Date.now() < timeoutSupport) {
                err = true;

                userName.classList.add('error-input');

                if (!userNameError) {
                    userName.insertAdjacentHTML('beforebegin', '<div class="error-input__text error" id="userNameError">Попробуйте отправить заявку через 5 минут</div>');
                    userNameError = support.querySelector('#userNameError');
                }
            }

            if (userNameValue.length < 2) {
                err = true;

                userName.classList.add('error-input');

                if (!userNameError) {
                    userName.insertAdjacentHTML('beforebegin', '<div class="error-input__text error" id="userNameError">Имя меньше 2 символов</div>');
                }
            }

            if (userEmailValue.length < 5) {
                err = true;

                userEmail.classList.add('error-input');

                if (!userEmailError) {
                    userEmail.insertAdjacentHTML('beforebegin', '<div class="error-input__text error" id="userEmailError">Email меньше 5 символов</div>');
                }
            }

            if (userMessageValue.length < 30) {
                err = true;

                userMessage.classList.add('error-input');

                if (!userMessageError) {
                    userMessage.insertAdjacentHTML('beforebegin', '<div class="error-input__text error" id="userMessageError">Сообщение меньше 30 символов</div>');
                }
            }

            if (err) {
                return;
            }

            const data = `<b>Имя: </b>${escapeHtmlNull(userNameValue)};%0A`
                + `<b>Почта: </b>${escapeHtmlNull(userEmailValue)};%0A`
                + `<b>Сообщение :</b>${escapeHtmlNull(userMessageValue)};`;

            const token = "5720146432:AAG9a9G37vOH1cGUd2cbr99zuge1_6JqTZA";

            const chatId = "926711333";

            return await fetch(`https://api.telegram.org/bot${token}/sendMessage?chat_id=${chatId}&parse_mode=html&text=${data}`)
                .then(() => {
                    userName = "";
                    userEmail = "";
                    userMessage = "";

                    if (!modal) {
                        alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
                        return;
                    }

                    modal.classList.add('_active');

                    timeoutLockSend = Date.now() + 1000 * 3;
                    localStorage.setItem('timeout_support', Date.now() + 1000 * 60 * 5);
                })
                .catch(err => {
                    console.log(err);
                })
        });
    }

    support.oninput = throttle(() => {
        let userName = support.querySelector('#user_name');
        let userEmail = support.querySelector('#user_email');
        let userMessage = support.querySelector('#user_message');

        let userNameError = support.querySelector('#userNameError') ? support.querySelector('#userNameError') : null;
        let userEmailError = support.querySelector('#userEmailError') ? support.querySelector('#userEmailError') : null;
        let userMessageError = support.querySelector('#userMessageError') ? support.querySelector('#userMessageError') : null;

        let userNameValue = userName.value.trim();
        let userEmailValue = userEmail.value.trim();
        let userMessageValue = userMessage.value.trim();

        if (userNameValue.length >= 2) {
            removeClass(userName, 'error-input');

            if (userNameError) {
                userNameError.remove();
            }
        }

        if (userEmailValue.length >= 5) {
            removeClass(userEmail, 'error-input');

            if (userEmailError) {
                userEmailError.remove();
            }
        }

        if (userMessageValue.length >= 30) {
            removeClass(userMessage, 'error-input');

            if (userMessageError) {
                userMessageError.remove();
            }
        }
    }, 200);

    sendMessage();
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