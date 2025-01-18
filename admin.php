<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Администратор - Учебный портал</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать, Администратор!</h1>
        <p>Здесь вы можете управлять пользователями и отслеживать общую активность.</p>
        <ul>
            <li><a href="#">Управление пользователями</a></li>
            <li><a href="#">Отчеты</a></li>
            <li><a href="#">Настройки системы</a></li>
            <li><a href="logout.php">Выйти</a></li>
        </ul>
    </div>
</body>
</html>
