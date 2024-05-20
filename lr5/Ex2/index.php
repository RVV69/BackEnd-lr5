<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Помилка підключення: ' . $e->getMessage();
    exit;
}

$sql = "SELECT * FROM tov";
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Lab5</title>
</head>
<body>
    <h1>Таблиця товарів</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Опис</th>
            <th>Ціна</th>
            <th>Кількість</th>
            <th>Категорія</th>
        </tr>
        <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td>" . htmlspecialchars($row['category']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Дії</h2>
    <form action="insert.php" method="post">
        <input type="submit" value="Додати запис">
    </form>

    <form action="delete.php" method="post">
        <label for="delete_id">ID запису для видалення:</label>
        <input type="number" name="delete_id" id="delete_id" required>
        <input type="submit" value="Вилучити запис">
    </form>
</body>
</html>
