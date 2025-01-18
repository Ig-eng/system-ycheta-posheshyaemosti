<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Студент - Учебный портал</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать, Студент!</h1>
        <p>Здесь вы можете отслеживать свои занятия, задания и общаться с преподавателями.</p>
        <ul>
            <li><a href="#">Мои занятия</a></li>
            <li><a href="#">Мои задания</a></li>
            <li><a href="#">Обратиться к преподавателю</a></li>
            <li><a href="logout.php">Выйти</a></li>
        </ul>
    </div>
</body>
</html>
