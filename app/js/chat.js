const chatTextarea = document.querySelector('.chat__textarea');

if (chatTextarea) {
    autosize(chatTextarea);

    const chatSend = document.querySelector('.chat__send');

    function deleteHeightImportant() {
        if (!chatTextarea.classList.contains('_height-important')) return;

        chatTextarea.classList.remove('_height-important');

        chatTextarea.removeEventListener('autosize:resized', deleteHeightImportant);
    }

    const socket = new WebSocket(`ws://127.0.0.1:2346?user_id=${SESSION_ID}`);

    const chatMessages = document.querySelector('.chat__messages');

    const applicationId = params.application_id;

    socket.onmessage = function (event) {

        const data = JSON.parse(event.data);

        if (applicationId != data.application_id) return;

        chatMessages.insertAdjacentHTML('beforeend',
            `<div class="chat__message ${checkFromMe(data.user_to)}">
                    ${data.text}
                </div>`
        );
    }

    chatSend.onclick = () => {
        const data = {
            application_id: applicationId,
            user_to: userTo,
            text: chatTextarea.value,
            type: "message"
        };

        socket.send(JSON.stringify(data))

        chatTextarea.value = '';
    }

    chatTextarea.addEventListener('autosize:resized', deleteHeightImportant);
}

function checkFromMe(id) {
    if (SESSION_ID == id) return;

    return '_from-me';
}