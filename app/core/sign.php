<?php

session_start();

// Подключение к Базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();

if(!empty($_POST['login'])) {
    $login = htmlentities($_POST['login']);
    $login = trim($login);
        
    $_SESSION['login'] = $login;

    // Проверка на существование логина
    $sql = 'SELECT login FROM users WHERE login = ?';
    $stmt = $pdo->x->prepare($sql);

    $stmt->execute([$login]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    // Если существует пользователь
    if($result) {
        header("Location: /room.php");
    } else {
        // Иначе создаем пользователя
        $sqlReg = 'INSERT INTO users (login) VALUES (?)';
        $stmtReg = $pdo->x->prepare($sqlReg);

        $stmtReg->execute([$login]);
            
        // Создать таблицу чатов
        $pdo->x->query(
            "CREATE TABLE IF NOT EXISTS $login(id INT (255) UNSIGNED NOT NULL AUTO_INCREMENT,
            chats VARCHAR(55) NOT NULL,    
            PRIMARY KEY (id))"
        );

        header("Location: /room.php"); 
    }   
} else {
    header("Location: /");
}