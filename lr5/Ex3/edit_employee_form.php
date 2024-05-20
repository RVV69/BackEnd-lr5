<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагувати працівника</title>
</head>
<body>
    <h1>Редагувати існуючого працівника</h1>
    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($employee) {
            ?>
            <form action="update_employee.php" method="post">
                <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
                <label for="name">Ім'я:</label>
                <input type="text" name="name" id="name" value="<?php echo $employee['name']; ?>" required><br>
                <label for="position">Посада:</label>
                <input type="text" name="position" id="position" value="<?php echo $employee['position']; ?>" required><br>
                <label for="salary">Зарплата:</label>
                <input type="number" name="salary" id="salary" value="<?php echo $employee['salary']; ?>" required><br>
                <input type="submit" value="Зберегти зміни">
            </form>
            <?php
        } else {
            echo "Працівник не знайдений.";
        }
    } else {
        echo "ID працівника не вказано.";
    }
    ?>
</body>
</html>
