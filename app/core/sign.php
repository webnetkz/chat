<?php

    session_start();

    require_once "../libs/DataBase.php";
    $pdo = new DataBase();

    if(!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
        $login = trim($login);
        
        $_SESSION['login'] = $login;

        //Проверка на существование логина
        $sql = 'SELECT login FROM users WHERE login = ?';
        $stmt = $pdo->x->prepare($sql);

        $stmt->execute([$login]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if($result) {
            header("Location: /chat.php");
        } else {
            $sqlReg = 'INSERT INTO users (login, online) VALUES (?, 1)';
            $stmtReg = $pdo->x->prepare($sqlReg);

            $stmtReg->execute([$login]);
            header("Location: /chat.php");
        }
        


        

    }