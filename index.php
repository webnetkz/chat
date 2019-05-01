<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SChat</title>

        <meta charset="UTF-8">
        <meta name="theme-color" content="rgb(54, 111, 149)">
        <meta name="author" content="WebNet">
        <meta name="description" content="SecretChat by WebNet">
        <meta name="keywords" content="RedactorPhoto">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">

        <link rel="shortcut icon" href="/secretchat.png" type="image/svg">
        <link rel="stylesheet" href="/public/styles/style.css">
        <link rel="stylesheet" href="/public/styles/mobileStyle.css">
        <link rel="manifest" href="/manifest.json">
        
    </head>

    <body>
        <div id="content">
        <form class="sign" action="/app/core/sign.php" method="POST">
            <label for="loginReg">Your login
            </label>
                <input type="text" name="login" autocomplete="off" class="inp" placeholder="Your login" id="loginReg">

        </form>  
        <img src="/public/img/logo.png" alt="logo" class="logo">
        </div>
        <script>
             // Проверка возможности запуска сервисного работника
            if('serviceWorker' in navigator) {
                navigator.serviceWorker
                    .register('/sw.js')
                    .then(function() { console.log("Service Worker Registered"); });
            }
        </script>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>