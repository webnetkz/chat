<?php

session_start();

require_once "../libs/DataBase.php";
$pdo = new DataBase();

$login = $_SESSION['login'];

// Удаление пользователя
$sql = 'DELETE FROM users WHERE login = ?';
$stmt = $pdo->x->prepare($sql);

$stmt->execute([$login]);

$pdo->x->query("DROP TABLE $login");
    

$_SESSION[] = ''; 
session_destroy();

header('Location: /');