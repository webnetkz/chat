document.forms.formChat.onsubmit = function(event) {
    event.preventDefault();

    var userText = document.forms.formChat.mes.value;
    userText = encodeURIComponent(userText);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', '/chat.php');

    var formData = new FormData(document.forms.formChat);

    xhr.onreadystatechange = function()  {
        if(xhr.readyState === 4 && xhr.status === 200) {
            returnText.textContent = xhr.responseText;
            alert(xhr.responseText);
        }
    }

    xhr.send(formData);

}