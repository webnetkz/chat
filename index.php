<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SecretChat</title>

        <meta charset="UTF-8">
        <meta name="theme-color" content="rgb(255, 255, 255)">
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
        <?php
            require_once "app/libs/DataBase.php";
            $pdo = new DataBase();


        ?>

        <form class="sign">
            <input type="text" name="login" autocomplete="off" class="inp" placeholder="Your login">
            <button type="submit" name="submit" class="inpBtn">GO</button>
        </form>

        
        </div>
        <script>
             // Проверка borwser на поддержку service worker
            if('serviceWorker' in navigator) {
                navigator.serviceWorker
                    .register('/sw.js')
                    .then(function() { console.log("Service Worker Registered"); });
            }
        </script>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>