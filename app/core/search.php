<?php

session_start();

require_once "../libs/DataBase.php";
$pdo = new DataBase();
$login = $_SESSION['login'];
$chat = $_SESSION['chat'];

// Неверные запросы
if($_POST['user'] === '' or $_POST['user'] === $_SESSION['login']) {
    header('Location: ../../room.php');
}

// Верный запрос
if(!empty($_POST['user'])) {
        
    $user = trim($_POST['user']);
    $user = htmlentities($user);
        
    // Поиск пользователя в таблицах
    $sql = 'SELECT * FROM users WHERE login = ?';
    $stmt = $pdo->x->prepare($sql);
        
    $stmt->execute([$user]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
    // Если пользователь существует
    if(!empty($result)) {

        // Создание таблицы чата
        $pdo->x->query(
            "CREATE TABLE $chat(id INT(255) UNSIGNED NOT NULL AUTO_INCREMENT,
            message VARCHAR(8000) NOT NULL,
            name VARCHAR(55) NOT NULL,
            PRIMARY KEY (id))"
        );
            
         // Добавления чатов 
         $pdo->x->query("INSERT INTO $login(chats) VALUES ('$chat')");
         $pdo->x->query("INSERT INTO $user(chats) VALUES ('$chat')");

        header('Location: ../../chat.php');
    } else {
        // Если пользователь не найден
        $_SESSION['mes'] = 'User is not found!';
        header('Location: ../../room.php');
    }  
}
    
