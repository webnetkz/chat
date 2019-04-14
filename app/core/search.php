<?php

    session_start();

    require_once "../libs/DataBase.php";
    $pdo = new DataBase();


    if(!empty($_POST['user'])) {
        
        $user = trim($_POST['user']);
        $user = htmlspecialchars($user);
        
        $sql = 'SELECT * FROM users WHERE login = ?';
        $stmt = $pdo->x->prepare($sql);
        
        $stmt->execute([$user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($result)) {

            $nameTable = $_SESSION['login'].'_'.$user;
            // Create Chat
            $pdo->x->query("CREATE TABLE chat_$nameTable(id INT(255) UNSIGNED NOT NULL AUTO_INCREMENT,
                message VARCHAR(8000) NOT NULL,
                name VARCHAR(55) NOT NULL,
                PRIMARY KEY (id)
            )");

            $_SESSION['user'] = $user;
            header('Location: ../../chat.php');
        } else {
            $_SESSION['mes'] = 'User is not found';
            header('Location: ../../room.php');
        }
        
    }
    
    
    if($_POST['user'] === '' or $_POST['user'] === $_SESSION['login']) {
        header('Location: ../../room.php');
    }
