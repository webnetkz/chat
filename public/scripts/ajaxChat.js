var chat = document.querySelector(".chat");

// Попытка отправки сообщения на сервер
document.forms.formChat.onsubmit = function(event) {
    
    // Отмена перезагрузки страницы
    event.preventDefault(event);
        
    var xhr = new XMLHttpRequest();
        
    xhr.open('POST', '/app/core/chat.php');
        
    var formData = new FormData(document.forms.formChat);
 
    // Если сервер ответил, добовляем сообщения в чат
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            chat.innerHTML = xhr.responseText;
        }
    }
        
    xhr.send(formData);
        
    // Очистка поля ввода и смещение фокуса
    document.forms.formChat.reset();
    chat.scrollTop = chat.scrollHeight;
}

// Проверка новых сообщений
setInterval(function con() {
    let xhr = new XMLHttpRequest();
    
        xhr.open('GET', '../../app/core/message.php', false);
        xhr.send();
        chat.innerHTML = xhr.responseText;

        // Смещение фокуса
        chat.scrollTop = chat.scrollHeight;
}, 1000);