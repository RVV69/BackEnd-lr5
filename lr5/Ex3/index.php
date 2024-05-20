<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список працівників</title>
</head>
<body>
    <h1>Список працівників</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Посада</th>
            <th>Зарплата</th>
            <th>Дії</th>
        </tr>
        <?php

        $pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');

        $sql = "SELECT * FROM employees";
        $stmt = $pdo->query($sql);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['position']) . "</td>";
            echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
            echo "<td><a href='edit_employee_form.php?id=" . $row['id'] . "'>Редагувати</a> | <a href='delete_employee.php?id=" . $row['id'] . "'>Видалити</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="add_employee_form.php">Додати нового працівника</a><br>
    <a href="stats.php">Статистика</a>
</body>
</html>
