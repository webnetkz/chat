<?php

    session_start();
    $nameChat = 'chat_'.$_SESSION['chat'];
    $login = $_SESSION['login'];
    
    // Connect DataBase
    require_once "../libs/DataBase.php";
    $pdo = new DataBase();
    
    // Append message for table chat
    if(!empty($_POST['mes'])) {
        $mes = htmlspecialchars($_POST['mes']);
            
        $pdo->x->query("INSERT INTO $nameChat (message, name) VALUES ('$mes', '$login')");
    }

    // Select message from table chat
    $chat = $pdo->x->query("SELECT * FROM $nameChat");
    $chat = $chat->fetchAll(PDO::FETCH_ASSOC);

    // Show message
    foreach($chat as $key => $value) {
        echo $value['message'] . htmlspecialchars_decode('&lt;br&gt;');
    }