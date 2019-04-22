<?php

    session_start();

    if(empty($_SESSION['login'])) {
        header("Location: /");
    }
    
    require_once "app/libs/DataBase.php";
    $pdo = new DataBase();

    $login = $_SESSION['login'];
    
    // Существующие чаты
    $res = $pdo->x->query("SELECT * FROM $login");
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($Chat)) {
        header("Location: /chat.php");
    }

    // Выбор чата
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
                <p class="login"><?php echo $login;?></p>
                <a href="app/core/exit.php"><button class="exit">Exit</button></a>
            </header>
            <p class="err">
                <?php 

                    if(!empty($_SESSION['mes'])) {
                        echo $_SESSION['mes'];
                        $_SESSION['mes'] = '';
                    }
                
                ?>
            </p>    
        <form action="app/core/search.php" method="POST" class="sign">
            <input type="text" autocomplete="off" class="inp" placeholder="search user" name="user">
            <input type="submit" class="subBtn" value="Go">
        </form>
        <nav>
            <form action="room.php" method="POST">
                <h4>Main chats</h4>
            
            <?php

                foreach($res as $k => $v) {
                    echo '<input type="submit" value="'. $v['chats'].'" class="chatsBtn" name="selChat">';
                }

            ?>

            </form>
        </nav>
        <img src="/public/img/logo.png" alt="logo" class="logo"> 
        </div>
        <script src="/public/scripts/main.js"></script>
    </body>
</html>