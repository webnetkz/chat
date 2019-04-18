<?php

    session_start();

    require_once "../libs/DataBase.php";
    $pdo = new DataBase();
    $login = $_SESSION['login'];

    if(!empty($_POST['user'])) {
        
        $user = trim($_POST['user']);
        $user = htmlspecialchars($user);
        
        // Search user from table
        $sql = 'SELECT * FROM users WHERE login = ?';
        $stmt = $pdo->x->prepare($sql);
        
        $stmt->execute([$user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If user select
        if(!empty($result)) {

            $nameChat = $_SESSION['login'].'_'.$user;
            // Create Chat
            $pdo->x->query(
                "CREATE TABLE chat_$nameChat(id INT(255) UNSIGNED NOT NULL AUTO_INCREMENT,
                message VARCHAR(8000) NOT NULL,
                name VARCHAR(55) NOT NULL,
                PRIMARY KEY (id))"
            );
            
            // Append name chat for main chats
            $pdo->x->query("INSERT INTO $login(chats) VALUES ('chat_$nameChat')");

            $_SESSION['chat'] = $nameChat;
            header('Location: ../../chat.php');
        } else {
            // If user in not found
            $_SESSION['mes'] = 'User is not found!';
            header('Location: ../../room.php');
        }  
    }
    
    // Bad require
    if($_POST['user'] === '' or $_POST['user'] === $_SESSION['login']) {
        header('Location: ../../room.php');
    }
