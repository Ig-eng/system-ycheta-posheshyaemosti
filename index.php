<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Система Учета Посещаемости</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Вход в систему</h1>
        <form action="login.php" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="role">Выберите роль:</label>
            <select id="role" name="role" required>
                <option value="student">Студент</option>
                <option value="teacher">Учитель</option>
                <option value="admin">Администратор</option>
            </select>
            <br>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>

