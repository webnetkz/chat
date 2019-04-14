<?php

    session_start();

    require_once "../libs/DataBase.php";
    $pdo = new DataBase();

    $login = $_SESSION['login'];

    $sql = 'DELETE FROM users WHERE login = ?';
    $stmt = $pdo->x->prepare($sql);

    $stmt->execute([$login]);
    

    $_SESSION[] = ''; 
    session_destroy();

    header('Location: /');