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
                    if (res.status >= 200 && res.status < 300) {
                        return res.json();
                    }

                    throw res;
                })
                .then(() => {
                    window.history.go(-1);
                })
                .catch(data => data.json())
                .then(res => alert(res?.message));
        }
    }
}

const applicationTableFilter = document.querySelector('.application__table tbody');

function getApplications(htmlContainer, htmlElem, queryParams = '') {
    return fetch(`${BACKEND_URL_API}/application${queryParams}`)
    .then(res => res.json())
    .then(res => {
        htmlElem.forEach(item => item.remove())
        console.log(res)
        res.forEach(elem => htmlContainer.insertAdjacentHTML('beforeend',
            `<tr class="application__item">
                <td>
                    <div class="application__flex">
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
                                ${elem?.from}
                            </div>
                            <span class="applicaton__arrow">
                                →
                            </span>
                            <div class="application__to" title="${elem?.to}">
                                <img src="./view/static/img/flag.png" alt="${elem?.to}">
                                ${elem?.to}
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
                    <a class="application__flex justify-center" href="/application_edit?id=${elem?.application_id}">
                        <svg width="1.19rem" height="1.19rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.38582 15.4531C3.90291 15.4531 3.45166 15.2869 3.12707 14.9781C2.71541 14.5902 2.51749 14.0044 2.58874 13.3711L2.88166 10.8061C2.93707 10.3231 3.22999 9.6819 3.57041 9.33356L10.07 2.45398C11.6929 0.736065 13.3871 0.688565 15.105 2.31148C16.8229 3.9344 16.8704 5.62856 15.2475 7.34648L8.74791 14.2261C8.41541 14.5823 7.79791 14.9148 7.31499 14.994L4.76582 15.4294C4.63124 15.4373 4.51249 15.4531 4.38582 15.4531ZM12.6112 2.30357C12.0017 2.30357 11.4712 2.68357 10.9329 3.25357L4.43332 10.1411C4.27499 10.3073 4.09291 10.7031 4.06124 10.9327L3.76832 13.4977C3.73666 13.759 3.79999 13.9727 3.94249 14.1073C4.08499 14.2419 4.29874 14.2894 4.55999 14.2498L7.10916 13.8144C7.33874 13.7748 7.71874 13.569 7.87707 13.4027L14.3767 6.52315C15.3583 5.47815 15.7146 4.51232 14.2817 3.16648C13.6483 2.5569 13.1021 2.30357 12.6112 2.30357Z" fill="white" />
                            <path d="M13.7275 8.66932C13.7117 8.66932 13.6879 8.66932 13.6721 8.66932C11.2021 8.42391 9.21502 6.54766 8.83502 4.09349C8.78752 3.76891 9.00919 3.46807 9.33377 3.41266C9.65835 3.36516 9.95919 3.58682 10.0146 3.91141C10.3154 5.82724 11.8671 7.29974 13.7988 7.48974C14.1234 7.52141 14.3609 7.81432 14.3292 8.13891C14.2896 8.43974 14.0284 8.66932 13.7275 8.66932Z" fill="white" />
                            <path d="M16.625 18.0098H2.375C2.05042 18.0098 1.78125 17.7406 1.78125 17.416C1.78125 17.0914 2.05042 16.8223 2.375 16.8223H16.625C16.9496 16.8223 17.2188 17.0914 17.2188 17.416C17.2188 17.7406 16.9496 18.0098 16.625 18.0098Z" fill="white" />
                        </svg>
                    </a>
                </td>
            </tr>`
        ))
    })
}

function getApplicationsFilter() {
    const applicationFilterButton = applicationTableFilter.querySelector('.application-filter__button');

    if (!applicationFilterButton) return;

    applicationFilterButton.onclick = () => {
        const from = document.getElementsByName("from")[0].value;
        const to = document.getElementsByName("to")[0].value;

        const applicationItem = applicationTableFilter.querySelectorAll('.application__item');

        fetch(`${BACKEND_URL_API}/application`)
            .then(res => res.json())
            .then(res => {
                applicationItem.forEach(item => item.remove())
                console.log(res)
                res.forEach(elem => applicationTableFilter.insertAdjacentHTML('beforeend',
                    `<tr class="application__item">
                        <td>
                            <div class="application__flex">
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
                                        ${elem?.from}
                                    </div>
                                    <span class="applicaton__arrow">
                                        →
                                    </span>
                                    <div class="application__to" title="${elem?.to}">
                                        <img src="./view/static/img/flag.png" alt="${elem?.to}">
                                        ${elem?.to}
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
                            <a class="application__flex justify-center" href="/application_edit?id=${elem?.application_id}">
                                <svg width="1.19rem" height="1.19rem" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.38582 15.4531C3.90291 15.4531 3.45166 15.2869 3.12707 14.9781C2.71541 14.5902 2.51749 14.0044 2.58874 13.3711L2.88166 10.8061C2.93707 10.3231 3.22999 9.6819 3.57041 9.33356L10.07 2.45398C11.6929 0.736065 13.3871 0.688565 15.105 2.31148C16.8229 3.9344 16.8704 5.62856 15.2475 7.34648L8.74791 14.2261C8.41541 14.5823 7.79791 14.9148 7.31499 14.994L4.76582 15.4294C4.63124 15.4373 4.51249 15.4531 4.38582 15.4531ZM12.6112 2.30357C12.0017 2.30357 11.4712 2.68357 10.9329 3.25357L4.43332 10.1411C4.27499 10.3073 4.09291 10.7031 4.06124 10.9327L3.76832 13.4977C3.73666 13.759 3.79999 13.9727 3.94249 14.1073C4.08499 14.2419 4.29874 14.2894 4.55999 14.2498L7.10916 13.8144C7.33874 13.7748 7.71874 13.569 7.87707 13.4027L14.3767 6.52315C15.3583 5.47815 15.7146 4.51232 14.2817 3.16648C13.6483 2.5569 13.1021 2.30357 12.6112 2.30357Z" fill="white" />
                                    <path d="M13.7275 8.66932C13.7117 8.66932 13.6879 8.66932 13.6721 8.66932C11.2021 8.42391 9.21502 6.54766 8.83502 4.09349C8.78752 3.76891 9.00919 3.46807 9.33377 3.41266C9.65835 3.36516 9.95919 3.58682 10.0146 3.91141C10.3154 5.82724 11.8671 7.29974 13.7988 7.48974C14.1234 7.52141 14.3609 7.81432 14.3292 8.13891C14.2896 8.43974 14.0284 8.66932 13.7275 8.66932Z" fill="white" />
                                    <path d="M16.625 18.0098H2.375C2.05042 18.0098 1.78125 17.7406 1.78125 17.416C1.78125 17.0914 2.05042 16.8223 2.375 16.8223H16.625C16.9496 16.8223 17.2188 17.0914 17.2188 17.416C17.2188 17.7406 16.9496 18.0098 16.625 18.0098Z" fill="white" />
                                </svg>
                            </a>
                        </td>
                    </tr>`
                ))
            })

        getApplications(applicationTableFilter, applicationItem, '')
    }
}

if (applicationTableFilter) {
    getApplicationsFilter();
}