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

        elem.onclick = () => {
            elem.classList.toggle('_active');
        }
    })
}