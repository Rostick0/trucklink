const inputSearchBlock = document.querySelector('.input-search__block');

if (inputSearchBlock) {
    const inputSearch = inputSearchBlock.querySelector('.input-search');
    const inputSearchList = inputSearchBlock.querySelector('.input-search__list');
    const inputSearchItem = inputSearchBlock.querySelectorAll('.input-search__item');

    function visibilityElems(value) {
        inputSearchItem.forEach(item => {
            if (!item.querySelector('label').textContent.trim().toLocaleLowerCase().includes(value.trim().toLocaleLowerCase())) {
                return item.classList.add('d-none')
            }

            if (item.classList.contains('d-none')) {
                item.classList.remove('d-none')
            }
        })
    }

    inputSearch.onclick = () => {
        inputSearchList.classList.add('d-flex');
    }

    inputSearch.oninput = (e) => {
        inputSearchList.classList.add('d-flex');

        visibilityElems(e.target.value);
    }

    inputSearch.onblur = () => {
        setTimeout(() => {
            if (inputSearchList.classList.contains('d-flex')) {
                inputSearchList.classList.remove('d-flex');
            }
        }, 250)
    }

    inputSearchItem.forEach(item => {
        item.onclick = () => {
            inputSearch.value = item.textContent.trim();

            if (inputSearchList.classList.contains('d-flex')) {
                inputSearchList.classList.remove('d-flex')
            }
        }
    })
}