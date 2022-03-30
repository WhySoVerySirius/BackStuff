import Chat from "./sevices/socket_service.js";
const URL = 'http://localhost:8080/';
(() => {
    const questionTab = document.getElementById('questionTab');
    const chatTab = document.getElementById('chatTab');
    questionTab.addEventListener('click', (e) => {
        e.preventDefault;
        window.location.href = URL + 'questions';
        questionTab.classList.add('selected');
    });
    chatTab.addEventListener('click', (f) => {
        f.preventDefault;
        window.location.href = URL + 'chat';
        chatTab.classList.add('selected');
        const activeChat = new Chat;
        activeChat.socketServiceConnect();
    });

})()