<?php

session_start();
$login = $_SESSION['login'];
$chat = $_SESSION['chat'];

// Подключение к базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();

// Выбор сообщений
$result = $pdo->x->query("SELECT * FROM $chat");
var_dump($chat);
// Отображение сообщений
//foreach($result as $k => $v) {
//    echo $value['name'] . ' : ' . $value['message'] . '<br>';
//}