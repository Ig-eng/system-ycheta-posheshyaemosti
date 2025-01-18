<?php
session_start();
if ($_SESSION['role'] != 'teacher') {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отметить посещаемость</title>
</head>
<body>
    <h1>Отметить посещаемость</h1>
    <form action="submit_attendance.php" method="post">
        <label for="subject">Предмет:</label>
        <input type="text" id="subject" name="subject" required>
        <br>
        <label for="date">Дата:</label>
        <input type="date" id="date" name="date" required>
        <br>
        <h3>Студенты:</h3>
        <?php
        $servername = "localhost"; 
        $username = "root"; 
        $password = "root"; 
        $dbname = "SYPO"; 

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        $sql = "SELECT id, user_id FROM students WHERE user_id IS NOT NULL";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo '<input type="checkbox" name="student_ids[]" value="'. $row['id'] .'">Студент ID: '. $row['user_id'] .'<br>';
        }

        $conn->close();
        ?>
        <br>
        <label for="status">Статус:</label>
        <select id="status" name="status">
            <option value="present">Присутствует</option>
            <option value="absent">Отсутствует</option>
        </select>
        <br>
        <button type="submit">Отметить посещаемость</button>
    </form>
</body>
</html>
