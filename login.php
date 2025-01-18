<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = "root"; 
$dbname = "SYPO"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}


$username = $_POST['username'];
$role = $_POST['role'];


$sql = "SELECT * FROM users WHERE username = ? AND role = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $role);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
  
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    header("Location: dashboard.php");
} else {
    echo "Пользователь не найден или неверная роль";
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
