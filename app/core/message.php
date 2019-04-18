<?php

session_start();
$login = $_SESSION['login'];
$nameChat = $_SESSION['chat'];

require_once "../libs/DataBase.php";
$pdo = new DataBase();

$result = $pdo->x->query("SELECT * FROM chat_$nameChat");

foreach($result as $key => $value) {
    echo $value['name'] . ' : ' . $value['message'] . '<br>';
}