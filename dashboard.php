<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root"; 
$password = "root"; 
$dbname = "SYPO";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}


$user_id = $_SESSION['user_id'];
$sql = "SELECT role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


if ($user['role'] == 'student') {

    echo "<h1>Ваше расписание посещаемости (Студент)</h1>";
    
} elseif ($user['role'] == 'teacher') {
    echo "<h1>Добро пожаловать, Учитель!</h1>";
  
    echo "<a href='attendance.php'>Отметить посещаемость</a>";
} elseif ($user['role'] == 'admin') {
    echo "<h1>Добро пожаловать, Администратор!</h1>";
    
    echo "<a href='admin.php'>Управление пользователями</a>";
} else {
    echo "<h1>Неизвестная роль!</h1>";
}

$conn->close();
?>
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Система Учета Посещаемости</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
