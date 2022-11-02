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
                                <div class="delivery_from">
                                    <div class="flag_from">
                                        <img class="application__flag" src="/view/static/img/flags/${wordLast(elem?.from)}.png" alt="${wordLast(elem?.from)}">
                                    </div>
                                    <div class="city__delivery_from">
                                        ${elem?.from}
                                    </div>
                                </div>
                                <span>&#8594;</span>
                                <div class="delivery_to">
                                    <div class="flag_from">
                                        <img class="application__flag" src="/view/static/img/flags/${wordLast(elem?.to)}.png" alt="${wordLast(elem?.to)}">
                                    </div>
                                    <div class="city__delivery_from">
                                        ${elem?.to}
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
                                <div class="info_message">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
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
                                <a class="info_options" href="/application_edit?id=${elem?.application_id}">
                                    <svg height="1.5rem" width="1.5rem" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <g>
                                            <path d="M466.895,305.126c-26.862-46.526-10.708-106.152,36.076-133.244l-50.312-87.146c-14.375,8.427-31.088,13.259-48.923,13.259
                                            c-53.769,0-97.354-43.873-97.354-97.995h-100.63c0.133,16.705-4.037,33.641-12.979,49.126
                                            c-26.862,46.528-86.578,62.351-133.431,35.379L9.029,171.651c14.485,8.236,27.025,20.294,35.943,35.739
                                            C71.792,253.844,55.729,313.35,9.119,340.502l50.313,87.146c14.325-8.348,30.958-13.126,48.7-13.126
                                            c53.598,0,97.072,43.597,97.35,97.479h100.627c-0.043-16.537,4.136-33.285,12.982-48.609
                                            c26.817-46.453,86.389-62.297,133.207-35.506l50.312-87.146C488.222,332.507,475.766,320.491,466.895,305.126z M256,359.667
                                            c-57.254,0-103.668-46.412-103.668-103.667c0-57.254,46.413-103.667,103.668-103.667c57.254,0,103.667,46.413,103.667,103.667
                                            C359.664,313.255,313.254,359.667,256,359.667z" fill="white" />
                                        </g>
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