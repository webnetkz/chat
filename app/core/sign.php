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
            $_SESSION['res'] = 'Логин существует!';
        }

        header("Location: ../../chat.php");
    }