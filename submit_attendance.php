<?php
session_start();
if ($_SESSION['role'] != 'teacher') {
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

$subject = $_POST['subject'];
$date = $_POST['date'];
$status = $_POST['status'];
$student_ids = isset($_POST['student_ids']) ? $_POST['student_ids'] : [];

foreach ($student_ids as $student_id) {
    $sql = "INSERT INTO attendance (student_id, date, subject, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $student_id, $date, $subject, $status);
    $stmt->execute();
}

echo "Посещаемость успешно отмечена!";
$conn->close();
?>
