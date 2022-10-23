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