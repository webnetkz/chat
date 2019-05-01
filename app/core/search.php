<?php

session_start();

// Подключение к базе данных
require_once "../libs/DataBase.php";
$pdo = new DataBase();

$login = $_SESSION['login'];


// Верный запрос обрабатываем
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

        $Chat = 'chat_'.$login.'_'.$user;
        $_SESSION['chat'] = $Chat;

        // Создание таблицы чата
        $pdo->x->query(
            "CREATE TABLE $Chat(id INT(255) UNSIGNED NOT NULL AUTO_INCREMENT,
            message VARCHAR(8000) NOT NULL,
            name VARCHAR(55) NOT NULL,
            PRIMARY KEY (id))"
        );

         // Добавления чатов
         $pdo->x->query("INSERT INTO $login(chats) VALUES ('$Chat')");
         $pdo->x->query("INSERT INTO $user(chats) VALUES ('$Chat')");

        header('Location: ../../chat.php');
    } else {
        // Если пользователь не найден
        $_SESSION['mes'] = 'User is not found!';
        header('Location: ../../room.php');
    }
}

// Пустой запрос
if($_POST['user'] === '') {
    header('Location: ../../room.php');
}