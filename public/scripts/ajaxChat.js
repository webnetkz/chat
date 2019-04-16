var chat = document.querySelector(".chat");

document.forms.formChat.onsubmit = function(event) {
    event.preventDefault();

    var userText = document.forms.formChat.mes.value;
    userText = encodeURIComponent(userText);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', '/app/core/chat.php');

    var formData = new FormData(document.forms.formChat);

    xhr.onreadystatechange = function()  {
        if(xhr.readyState === 4 && xhr.status === 200) {
            chat.textContent = xhr.responseText;
        }
    }

    xhr.send(formData);

}