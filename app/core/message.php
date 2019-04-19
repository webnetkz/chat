<?php

session_start();
$login = $_SESSION['login'];
$nameChat = $_SESSION['chat'];

// Подключение к базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();

// Выбор сообщений
$result = $pdo->x->query("SELECT * FROM chat_$nameChat");

// Отображение сообщений
foreach($result as $key => $value) {
    echo $value['name'] . ' : ' . $value['message'] . '<br>';
}