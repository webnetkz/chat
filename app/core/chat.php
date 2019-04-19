<?php

session_start();
$nameChat = 'chat_'.$_SESSION['chat'];
$login = $_SESSION['login'];
    
// Подключение к базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();
    
// Добавить сообщение в чат
if(!empty($_POST['mes'])) {
    $mes = htmlspecialchars($_POST['mes']);
    $pdo->x->query("INSERT INTO $nameChat (message, name) VALUES ('$mes', '$login')");
}

// Выбрать сообщения чата
$chat = $pdo->x->query("SELECT * FROM $nameChat");
$chat = $chat->fetchAll(PDO::FETCH_ASSOC);

// Отобразить сообщения
foreach($chat as $key => $value) {
    echo $value['name'] . ' : ' . $value['message'] . '<br>';
}


