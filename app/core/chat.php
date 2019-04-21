<?php

session_start();
$Chat = $_SESSION['chat'];
$login = $_SESSION['login'];
    
// Подключение к базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();
    
// Добавить сообщение в чат
if(!empty($_POST['mes'])) {
    $mes = htmlentities($_POST['mes']);
    $pdo->x->query("INSERT INTO $Chat (message, name) VALUES ('$mes', '$login')");
}

// Выбрать сообщения чата
$mes = $pdo->x->query("SELECT * FROM $Chat");
$mes = $mes->fetchAll(PDO::FETCH_ASSOC);

// Отобразить сообщения
foreach($mes as $key => $value) {
    echo $value['name'] . ' : ' . $value['message'] . '<br>';
}


