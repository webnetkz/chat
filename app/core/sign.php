<?php

    session_start();

    require_once "../libs/DataBase.php";
    $pdo = new DataBase();

    if(!empty($_POST['login'])) {
        $login = htmlspecialchars($_POST['login']);
        $login = trim($login);
        
        $_SESSION['login'] = $login;
        header("Location: ../../");
    }