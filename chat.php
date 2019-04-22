<?php

    session_start();
    $login = $_SESSION['login'];
    $Chat = $_SESSION['chat'];

    require_once "/app/libs/DataBase.php";
    $pdo = new DataBase();

?>
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
        <header>
            <p class="login"><?php echo $login;?></p>
            <a href="/room.php"><button class="exit">Back</button></a>
        </header>
        <div class="chat" id="chat">
        </div>
        <form class="chat" name="formChat">
            <input type="text" name="mes" autocomplete="off" class="inp mes" placeholder="Text" autofocus>
            <input type="submit" class="subBtn sendBtn" value="Send">
        </form>
        <img src="/public/img/logo.png" alt="logo" class="logo">
        </div>
        <script src="/public/scripts/ajaxChat.js"></script>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>