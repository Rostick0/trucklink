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