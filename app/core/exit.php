<?php

    session_start();

    require_once "../libs/DataBase.php";
    $pdo = new DataBase();

    $login = $_SESSION['login'];
    $pdo->x->query("DELETE FROM users WHERE login = $login");

    session_destroy();

    header('Location: /');