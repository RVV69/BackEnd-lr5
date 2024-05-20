<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати працівника</title>
</head>
<body>
    <h1>Додати нового працівника</h1>
    <form action="insert_employee.php" method="post">
        <label for="name">Ім'я:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="position">Посада:</label>
        <input type="text" name="position" id="position" required><br>
        <label for="salary">Зарплата:</label>
        <input type="number" name="salary" id="salary" required><br>
        <input type="submit" value="Додати">
    </form>
</body>
</html>
