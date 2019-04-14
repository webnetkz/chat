<?php

        session_start();


        require_once "app/libs/DataBase.php";
        $pdo = new DataBase();

        if(!empty($_POST['mes'])) {

        }

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


        <div class="chat">
            <?php
                $nameChat = $_SESSION['chat'];
                $chat = $pdo->x->query("SELECT * FROM chat_$nameChat");
                $chat = $chat->fetchAll(PDO::FETCH_ASSOC);

                foreach($chat as $key => $value) {
                    echo $value['name'] . ':' . $value['message'] . '<br>';
                }
            ?>
        </div>
           

        <form class="chat" action="/chat.php" method="POST">
            <input type="text" name="mes" autocomplete="off" class="inp mes" placeholder="Text">
            <input type="submit" class="subBtn sendBtn" value="Send">
        </form>

            
        <img src="/public/img/logo.png" alt="logo" class="logo">
        
        </div>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>