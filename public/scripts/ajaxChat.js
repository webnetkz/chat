var chat = document.querySelector(".chat");

    document.forms.formChat.onsubmit = function(event) {
        
        event.preventDefault(event);
        
        var xhr = new XMLHttpRequest();
        
        xhr.open('POST', '/app/core/chat.php');
        
        var formData = new FormData(document.forms.formChat);
        
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4 && xhr.status === 200) {
                chat.innerHTML = xhr.responseText;
            }
        }
        
        xhr.send(formData);
        
        // Clear input text and scroll down page
        document.forms.formChat.reset();
        chat.scrollTop = chat.scrollHeight;
    }
