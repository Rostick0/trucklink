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