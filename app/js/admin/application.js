const applicationDelete = document.querySelector('._application-delete');

if (applicationDelete) {
    applicationDelete.onclick = () => {
        const confirmRemove = confirm('Подтвердите удаление');

        if (confirmRemove) {
            fetch(`${BACKEND_URL_API}/application?application_id=${params.id}`, {
                method: 'DELETE'
            })
                .then(res => {
                    if (res.status >= 200 && res.status < 300) {
                        return res.json();
                    }

                    throw res;
                })
                .then(() => {
                    //window.history.go(-1);
                })
                .catch(data => data.json())
                .then(res => alert(res?.message));
        }
    }
}

const applicationTableFilterAdmin = document.querySelector('.application__table._filter-admin tbody');

function getApplicationsAdmin(htmlContainer, htmlElem, queryParams = '') {
    return fetch(`${BACKEND_URL_API}/application${queryParams}`)
        .then(res => res.json())
        .then(res => {

            if (htmlElem) {
                htmlElem.forEach(item => item.remove())
            }

            if (!res[0]) {
                htmlContainer.insertAdjacentHTML('beforeend',
                    `<tr class="application__item _none">
                <td>
                    <div class="application__flex">
                        <div class="application__status"></div>
                        <span>
                            ${null}
                        </span>
                    </div>
                </td>
                <td colspan=2>
                    <div class="application__route">
                        <div class="application__way">
                            <div class="application__from" title="${null}">
                                <img src="./view/static/img/flag.png" alt="${null}">
                                ${null}
                            </div>
                            <span class="applicaton__arrow">
                                →
                            </span>
                            <div class="application__to" title="${null}">
                                <img src="./view/static/img/flag.png" alt="${null}">
                                ${null}
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="application__date">
                        ${null}
                    </div>
                </td>
                <td>
                    <div class="application__transport">
                        ${null}
                    </div>
                </td>
                <td>
                    <div class="application__payment">
                        ${null}
                    </div>
                </td>
                <td>
                    <div class="application__flex justify-center">
                        <div class="application__chat">
                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="application__flex justify-center">
                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.4002 17.4201H10.8902C9.25016 17.4201 7.92016 16.0401 7.92016 14.3401C7.92016 13.9301 8.26016 13.5901 8.67016 13.5901C9.08016 13.5901 9.42016 13.9301 9.42016 14.3401C9.42016 15.2101 10.0802 15.9201 10.8902 15.9201H13.4002C14.0502 15.9201 14.5902 15.3401 14.5902 14.6401C14.5902 13.7701 14.2802 13.6001 13.7702 13.4201L9.74016 12.0001C8.96016 11.7301 7.91016 11.1501 7.91016 9.36008C7.91016 7.82008 9.12016 6.58008 10.6002 6.58008H13.1102C14.7502 6.58008 16.0802 7.96008 16.0802 9.66008C16.0802 10.0701 15.7402 10.4101 15.3302 10.4101C14.9202 10.4101 14.5802 10.0701 14.5802 9.66008C14.5802 8.79008 13.9202 8.08008 13.1102 8.08008H10.6002C9.95016 8.08008 9.41016 8.66008 9.41016 9.36008C9.41016 10.2301 9.72016 10.4001 10.2302 10.5801L14.2602 12.0001C15.0402 12.2701 16.0902 12.8501 16.0902 14.6401C16.0802 16.1701 14.8802 17.4201 13.4002 17.4201Z" fill="white" />
                            <path d="M12 18.75C11.59 18.75 11.25 18.41 11.25 18V6C11.25 5.59 11.59 5.25 12 5.25C12.41 5.25 12.75 5.59 12.75 6V18C12.75 18.41 12.41 18.75 12 18.75Z" fill="white" />
                            <path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z" fill="white" />
                        </svg>
                        <span>
                            Pay order
                        </span>
                    </div>
                </td>
                <td>
                    <div class="application__flex justify-center">
                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 11L22 2L13 21L11 13L3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </td>
                <td>
                    <a class="application__flex justify-center">
                        <svg width="1.19rem" height="1.19rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.38582 15.4531C3.90291 15.4531 3.45166 15.2869 3.12707 14.9781C2.71541 14.5902 2.51749 14.0044 2.58874 13.3711L2.88166 10.8061C2.93707 10.3231 3.22999 9.6819 3.57041 9.33356L10.07 2.45398C11.6929 0.736065 13.3871 0.688565 15.105 2.31148C16.8229 3.9344 16.8704 5.62856 15.2475 7.34648L8.74791 14.2261C8.41541 14.5823 7.79791 14.9148 7.31499 14.994L4.76582 15.4294C4.63124 15.4373 4.51249 15.4531 4.38582 15.4531ZM12.6112 2.30357C12.0017 2.30357 11.4712 2.68357 10.9329 3.25357L4.43332 10.1411C4.27499 10.3073 4.09291 10.7031 4.06124 10.9327L3.76832 13.4977C3.73666 13.759 3.79999 13.9727 3.94249 14.1073C4.08499 14.2419 4.29874 14.2894 4.55999 14.2498L7.10916 13.8144C7.33874 13.7748 7.71874 13.569 7.87707 13.4027L14.3767 6.52315C15.3583 5.47815 15.7146 4.51232 14.2817 3.16648C13.6483 2.5569 13.1021 2.30357 12.6112 2.30357Z" fill="white" />
                            <path d="M13.7275 8.66932C13.7117 8.66932 13.6879 8.66932 13.6721 8.66932C11.2021 8.42391 9.21502 6.54766 8.83502 4.09349C8.78752 3.76891 9.00919 3.46807 9.33377 3.41266C9.65835 3.36516 9.95919 3.58682 10.0146 3.91141C10.3154 5.82724 11.8671 7.29974 13.7988 7.48974C14.1234 7.52141 14.3609 7.81432 14.3292 8.13891C14.2896 8.43974 14.0284 8.66932 13.7275 8.66932Z" fill="white" />
                            <path d="M16.625 18.0098H2.375C2.05042 18.0098 1.78125 17.7406 1.78125 17.416C1.78125 17.0914 2.05042 16.8223 2.375 16.8223H16.625C16.9496 16.8223 17.2188 17.0914 17.2188 17.416C17.2188 17.7406 16.9496 18.0098 16.625 18.0098Z" fill="white" />
                        </svg>
                    </a>
                </td>
            </tr>`
                )
                return;
            }

            res.forEach(elem => htmlContainer.insertAdjacentHTML('beforeend',
                `<tr class="application__item">
                    <td>
                        <div class="application__flex">
                            </svg>
                            <div class="application__status"></div>
                            <span>
                                ${elem?.status}
                            </span>
                        </div>
                    </td>
                    <td colspan=2>
                        <div class="application__route">
                            <div class="application__way">
                                <div class="application__from" title="${elem?.from}">
                                    <img src="./view/static/img/flag.png" alt="${elem?.from}">
                                    ${stringMaxAndPoint(elem?.from)}
                                </div>
                                <span class="applicaton__arrow">
                                    →
                                </span>
                                <div class="application__to" title="${elem?.to}">
                                    <img src="./view/static/img/flag.png" alt="${elem?.to}">
                                    ${stringMaxAndPoint(elem?.to)}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="application__date">
                            ${elem?.date}
                        </div>
                    </td>
                    <td>
                        <div class="application__transport">
                            ${elem?.transport_type}
                        </div>
                    </td>
                    <td>
                        <div class="application__payment">
                            ${elem?.price}
                        </div>
                    </td>
                    <td>
                        <div class="application__flex justify-center">
                            <div class="application__chat">
                                <!-- <div class="application__chat_count">
                                0
                            </div> -->
                                <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M22 6L12 13L2 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="application__flex justify-center">
                            <span>
                                ID ${elem?.application_id}
                            </span>
                        </div>
                    </td>
                    <td>
                        <a class="application__flex justify-center" href="/application_edit?id=${elem?.application_id}">
                            <svg fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1.8rem" height="1.8rem">
                                <path d="M 10.490234 2 C 10.011234 2 9.6017656 2.3385938 9.5097656 2.8085938 L 9.1757812 4.5234375 C 8.3550224 4.8338012 7.5961042 5.2674041 6.9296875 5.8144531 L 5.2851562 5.2480469 C 4.8321563 5.0920469 4.33375 5.2793594 4.09375 5.6933594 L 2.5859375 8.3066406 C 2.3469375 8.7216406 2.4339219 9.2485 2.7949219 9.5625 L 4.1132812 10.708984 C 4.0447181 11.130337 4 11.559284 4 12 C 4 12.440716 4.0447181 12.869663 4.1132812 13.291016 L 2.7949219 14.4375 C 2.4339219 14.7515 2.3469375 15.278359 2.5859375 15.693359 L 4.09375 18.306641 C 4.33275 18.721641 4.8321562 18.908906 5.2851562 18.753906 L 6.9296875 18.1875 C 7.5958842 18.734206 8.3553934 19.166339 9.1757812 19.476562 L 9.5097656 21.191406 C 9.6017656 21.661406 10.011234 22 10.490234 22 L 13.509766 22 C 13.988766 22 14.398234 21.661406 14.490234 21.191406 L 14.824219 19.476562 C 15.644978 19.166199 16.403896 18.732596 17.070312 18.185547 L 18.714844 18.751953 C 19.167844 18.907953 19.66625 18.721641 19.90625 18.306641 L 21.414062 15.691406 C 21.653063 15.276406 21.566078 14.7515 21.205078 14.4375 L 19.886719 13.291016 C 19.955282 12.869663 20 12.440716 20 12 C 20 11.559284 19.955282 11.130337 19.886719 10.708984 L 21.205078 9.5625 C 21.566078 9.2485 21.653063 8.7216406 21.414062 8.3066406 L 19.90625 5.6933594 C 19.66725 5.2783594 19.167844 5.0910937 18.714844 5.2460938 L 17.070312 5.8125 C 16.404116 5.2657937 15.644607 4.8336609 14.824219 4.5234375 L 14.490234 2.8085938 C 14.398234 2.3385937 13.988766 2 13.509766 2 L 10.490234 2 z M 12 8 C 14.209 8 16 9.791 16 12 C 16 14.209 14.209 16 12 16 C 9.791 16 8 14.209 8 12 C 8 9.791 9.791 8 12 8 z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a class="application__flex justify-center">
                            <svg width="1.5rem" height="1.5rem" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4.5" y="5.10059" width="15" height="18" rx="1.5" stroke="#F53D3D" stroke-width="1.5" />
                                <rect x="2.25" y="2.10059" width="19.5" height="3" rx="0.75" stroke="#F53D3D" stroke-width="1.5" stroke-linejoin="round" />
                                <path d="M9 0.899414L15 0.899414" stroke="#F53D3D" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M12 9V19.5" stroke="#F53D3D" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M15.75 9V19.5" stroke="#F53D3D" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M8.25 9V19.5" stroke="#F53D3D" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </td>
                </tr>`
            ))
        })
}

function getApplicationsFilterAdmin() {
    const applicationFilterButton = applicationTableFilterAdmin.querySelector('.application-filter__button');

    if (!applicationFilterButton) return;

    applicationFilterButton.onclick = () => {
        const from = document.getElementsByName('from')[0].value;
        const to = document.getElementsByName('to')[0].value;
        const date = document.getElementsByName('date')[0].value

        const status = [...document.getElementsByName('status')].filter(elem => elem.checked)[0]?.value;
        const transportType = [...document.getElementsByName('transport_type')].filter(elem => elem.checked)[0]?.value;
        const price = document.querySelector('.application-filter_select__input._price').value;
        const applicationId = document.querySelector('.application-filter_input._application-id').value;

        console.log(applicationId)

        let queryParams = '';

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
            },
            {
                queryParam: applicationId ? `&application_id=${applicationId}` : ''
            }
        ];

        console.log(filterDate)

        filterDate.forEach(elem => {
            if (!elem?.queryParam) return;

            queryParams += elem?.queryParam
        })

        queryParams = queryParams ? '?' + queryParams.substr(1) : '';

        console.log(queryParams);

        const applicationItem = applicationTableFilterAdmin.querySelectorAll('.application__item');

        getApplicationsAdmin(applicationTableFilterAdmin, applicationItem, queryParams);
    }

    getApplicationsAdmin(applicationTableFilterAdmin, null, '');
}

if (applicationTableFilterAdmin) {
    // const calendarFirst = document.querySelector('.calendar-admin');
    // const calendarFromActive = document.querySelector('.calendar-from__active-admin');

    // const calendarStart = new Calendar(calendarFirst, calendarFromActive);
    // calendarStart.start();
    // calendarStart.setPreviousDays(true);

    getApplicationsFilterAdmin();
}