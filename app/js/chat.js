const chatTextarea = document.querySelector('.chat__textarea');

if (chatTextarea) {
    autosize(chatTextarea);

    function deleteHeightImportant() {
        if (!chatTextarea.classList.contains('_height-important')) return;

        chatTextarea.classList.remove('_height-important');

        chatTextarea.removeEventListener('autosize:resized', deleteHeightImportant);
    }

    chatTextarea.addEventListener('autosize:resized', deleteHeightImportant);
}