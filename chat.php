<?php

    session_start();

    if(empty($_SESSION['login'])) {
        header("Location: /");
    }

    require_once "/app/libs/DataBase.php";
    $pdo = new DataBase();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SecretChat</title>

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

        <?php 
             echo $_SESSION['login'];
        ?>


            
        <img src="/public/img/logo.png" alt="logo" class="logo">
        
        </div>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>