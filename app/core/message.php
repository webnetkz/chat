<?php

session_start();
$login = $_SESSION['login'];
$Chat = $_SESSION['chat'];

// Подключение к базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();

// Выбор сообщений
$result = $pdo->x->query("SELECT * FROM $Chat");
$result = $result->fetchAll(PDO::FETCH_ASSOC);

// Отображение сообщений
foreach($result as $k => $v) {
    echo $v['name'] . ' : ' . $v['message'] . '<br>';
}