const inputBlockFile = document.querySelector('.input__block_file');

if (inputBlockFile) {
    const inputPhoto = inputBlockFile.querySelector('#photo');
    const inputBlockFileContentText = inputBlockFile.querySelector('.input__block_file_content_text');

    inputPhoto.onchange = () => {
        if (!inputPhoto.files[0]) return;

        const file = inputPhoto.files[0];

        inputBlockFileContentText.textContent = `Ваш файл загружен`;

        inputPhoto.title = "Вы можете заново загрузить файл";
    }
}

const applicationDelete = document.querySelector('._application-delete');

if (applicationDelete) {
    applicationDelete.onclick = () => {
        const confirmRemove = confirm('Подтвердите удаление');

        if (confirmRemove) {
            fetch(`${BACKEND_URL_API}/application?application_id=${params.id}`, {
                method: 'DELETE'
            })
                .then(res => {
                    if (res.status >= 200 && res.status < 300) return res.json();

                    throw res;
                })
                .then(() => window.history.go(-1))
                .catch(data => data.json())
                .then(res => console.log(res?.message));
        }
    }
}

const applicationTableFilter = document.querySelector('.orders_table');

function getApplications(htmlContainer, htmlElem, queryParams = '') {
    return fetch(`${BACKEND_URL_API}/application${queryParams}`)
        .then(res => res.json())
        .then(res => {

            console.log(res)

            if (htmlElem) {
                htmlElem.forEach(item => item.remove())
            }

            if (!res[0]) {
                htmlContainer.insertAdjacentHTML('beforeend',
                    `
            <div class="string_orders">
                Нет заявок
            </div>`
                )
                return;
            }

            res.forEach(elem => htmlContainer.insertAdjacentHTML('beforeend',
                `<div class="string_orders">
                            <div class="order_status">
                                <div class="status_icon"></div>
                                <div class="status_word">
                                    ${elem?.status}
                                </div>
                            </div>
                            <div class="info_delivery">
                                <div class="delivery_from" title="${elem?.from}">
                                    <div class="flag_from">
                                        <img class="application__flag" src="/view/static/img/flags/${wordLast(elem?.from)}.png" alt="${wordLast(elem?.from)}">
                                    </div>
                                    <div class="city__delivery_from">
                                        ${stringMaxAndPoint(elem?.from)}
                                    </div>
                                </div>
                                <span>&#8594;</span>
                                <div class="delivery_to" title="${elem?.to}">
                                    <div class="flag_from">
                                        <img class="application__flag" src="/view/static/img/flags/${wordLast(elem?.to)}.png" alt="${wordLast(elem?.to)}">
                                    </div>
                                    <div class="city__delivery_from">
                                        ${stringMaxAndPoint(elem?.to)}
                                    </div>
                                </div>
                            </div>
                            <div class="info_date">
                                ${elem?.date}
                            </div>
                            <div class="info_car">
                                ${elem?.transport_type}
                            </div>
                            <div class="info_payment">
                                <div class="info_price">
                                    ${elem?.price}
                                </div>
                                <a class="info_message" href="/chat?application_id=${elem?.application_id}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                            <div class="info_last">
                                <div class="info_pay_order">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.4 17.4201H10.89C9.25003 17.4201 7.92003 16.0401 7.92003 14.3401C7.92003 13.9301 8.26003 13.5901 8.67003 13.5901C9.08003 13.5901 9.42003 13.9301 9.42003 14.3401C9.42003 15.2101 10.08 15.9201 10.89 15.9201H13.4C14.05 15.9201 14.59 15.3401 14.59 14.6401C14.59 13.7701 14.28 13.6001 13.77 13.4201L9.74003 12.0001C8.96003 11.7301 7.91003 11.1501 7.91003 9.36008C7.91003 7.82008 9.12003 6.58008 10.6 6.58008H13.11C14.75 6.58008 16.08 7.96008 16.08 9.66008C16.08 10.0701 15.74 10.4101 15.33 10.4101C14.92 10.4101 14.58 10.0701 14.58 9.66008C14.58 8.79008 13.92 8.08008 13.11 8.08008H10.6C9.95003 8.08008 9.41003 8.66008 9.41003 9.36008C9.41003 10.2301 9.72003 10.4001 10.23 10.5801L14.26 12.0001C15.04 12.2701 16.09 12.8501 16.09 14.6401C16.08 16.1701 14.88 17.4201 13.4 17.4201Z" fill="white" />
                                        <path d="M12 18.75C11.59 18.75 11.25 18.41 11.25 18V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V18C12.75 18.41 12.41 18.75 12 18.75Z" fill="white" />
                                        <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="white" />
                                    </svg>
                                    <div class="pay_order">Pay order</div>
                                </div>
                                <div class="info_gps">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <a class="info_options" href="/application?id=${elem?.application_id}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                
                                </a>
                            </div>
                        </div>`
            ))
        })
}

function getApplicationsFilter() {
    const applicationFilterButton = document.querySelector('.button__filter');

    if (!applicationFilterButton) return;

    applicationFilterButton.onclick = () => {
        const from = document.getElementsByName('from')[0]?.value;
        const to = document.getElementsByName('to')[0]?.value;
        const date = document.getElementsByName('date')[0]?.value

        const status = [...document.getElementsByName('status')].filter(elem => elem.checked)[0]?.value;
        const transportType = [...document.getElementsByName('transport_type')].filter(elem => elem.checked)[0]?.value;
        const price = document.querySelector('._price').value;

        let queryParams = `?user_id=${QUERY_ID}`;

        const filterDate = [
            {
                queryParam: from ? `&from=${from}` : ''
            },
            {
                queryParam: to ? `&to=${to}` : ''
            },
            {
                queryParam: date ? `&date=${normalizeDateSql(date)}` : ''
            },
            {
                queryParam: status ? `&status=${status}` : ''
            },
            {
                queryParam: transportType ? `&transport_type=${transportType}` : ''
            },
            {
                queryParam: price ? `&price_max=${price}` : ''
            }
        ];

        filterDate.forEach(elem => queryParams += elem?.queryParam)

        console.log(queryParams);

        const applicationItem = applicationTableFilter.querySelectorAll('.string_orders');

        getApplications(applicationTableFilter, applicationItem, queryParams);
    }

    getApplications(applicationTableFilter, null, `?user_id=${QUERY_ID}`);
}

if (applicationTableFilter) {
    // const calendarFirst = document.querySelector('.calendar');
    // const calendarFromActive = document.querySelector('.calendar-from__active');

    // const calendarStart = new Calendar(calendarFirst, calendarFromActive);
    // calendarStart.start();
    // calendarStart.previousDays(true);

    getApplicationsFilter();
}
const mass = document.getElementById('mass');
if(mass){
    let keyCode;
    function massInput(event) {
        event.keyCode && (keyCode = event.keyCode);
        let pos = this.selectionStart;
        if (pos < 1) event.preventDefault();
        let val = parseFloat(this.value.replace(/[^0-9\.]/g,''))||0;
        if(event.inputType == 'deleteContentBackward'){
            val = parseFloat(val.toString().slice(0, -1))||0;
        }
        this.value = val + ' т';
        this.selectionStart = this.value.length - 2;
        this.selectionEnd = this.value.length - 2;
    }
    mass.addEventListener('input', massInput, false);
    mass.addEventListener('blur', massInput, false);
}
const priceBlock = document.getElementById('price__block');
if(priceBlock){
    const price = document.getElementById('price');
    const priceType = document.getElementById('price_type');
    const selectOption = priceType.querySelectorAll('.select__option');
    priceBlock.onclick = (e) => {
        e.stopPropagation();
        e.preventDefault();
    };
    selectOption.forEach(option => {
        option.addEventListener('click', (e) => {
            if(option.querySelector('#price_type_0')){
                priceBlock.classList.remove('show');
                price.value = 0;
            }else{
                priceBlock.classList.add('show');
                price.value = '';
            }
        }, false);
    });
}