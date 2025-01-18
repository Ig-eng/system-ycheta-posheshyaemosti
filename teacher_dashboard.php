<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Учитель - Учебный портал</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать, Учитель!</h1>
        <p>Здесь вы можете управлять занятиями и проверять задания студентов.</p>
        <ul>
            <li><a href="#">Мои занятия</a></li>
            <li><a href="#">Проверка заданий</a></li>
            <li><a href="#">Общение со студентами</a></li>
            <li><a href="logout.php">Выйти</a></li>
        </ul>
    </div>
</body>
</html>
