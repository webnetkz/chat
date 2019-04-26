<?php

session_start();
$login = $_SESSION['login'];

require_once "../libs/DataBase.php";
$pdo = new DataBase();

// Очистить список чатов
$res = $pdo->x->query("SELECT * FROM $login");
if($res) {
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
}

$Chat = $res[0]['chats'];

// Удалить пользователя и его таблицы
$sql = 'DELETE FROM users WHERE login = ?';
$stmt = $pdo->x->prepare($sql);

$stmt->execute([$login]);

$pdo->x->query("DROP TABLE $login");
$pdo->x->query("DROP TABLE $Chat");
    

$_SESSION[] = ''; 
session_destroy();

header('Location: /');