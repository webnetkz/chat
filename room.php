<?php

    session_start();

    // Попытка входа без логина
    if(!empty($_SESSION['login'])) {
        header("Location: /index.php");
    }
    
    // Подключение к базе данных
    require_once "app/libs/DataBase.php";
    $pdo = new DataBase();

    $login = $_SESSION['login'];
    
    // Существующие чаты пользователя
    $res = $pdo->x->query("SELECT * FROM $login");

    if($res) {
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
    }

    // Запустить новый чат 
    if(!empty($_POST['selChat'])) {
        $Chat = $_POST['selChat'];
        $_SESSION['chat'] = $Chat;
        header("Location: /chat.php");
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
            <header>
                <p class="login">
                    <?php if(!empty($_SESSION['login'])) { echo $_SESSION['login'];}?>
                </p>
                <a href="app/core/exit.php">
                    <button class="exit">Exit</button>
                </a>
            </header>
            <p class="err">
                <?php 
                    // Отображение ошибки поиска пользователя
                    if(!empty($_SESSION['mes'])) {
                        echo $_SESSION['mes'];
                        $_SESSION['mes'] = '';
                    }
                
                ?>
            </p>    
        <form action="app/core/search.php" method="POST" class="sign">
            <label for="searchUser">
                <input type="text" autocomplete="off" class="inp" placeholder="search user" name="user" id="searchUser">
            </label>
        </form>
        <nav>
            <form action="room.php" method="POST">
                <h4>Main chats</h4>
            
            <?php

                if(!empty($res)) {
                    foreach($res as $k => $v) {
                        echo '<input type="submit" value="'. $v['chats'].'" class="chatsBtn" name="selChat">';
                    }
                }

        
            ?>

            </form>
        </nav>
        <img src="/public/img/logo.png" alt="logo" class="logo"> 
        </div>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>