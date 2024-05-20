<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати запис</title>
</head>
<body>
    <h1>Додати новий запис</h1>
    <form action="insert_process.php" method="post">
        <label for="name">Назва:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="description">Опис:</label>
        <input type="text" name="description" id="description" required><br>
        <label for="price">Ціна:</label>
        <input type="number" name="price" id="price" required><br>
        <label for="quantity">Кількість:</label>
        <input type="number" name="quantity" id="quantity" required><br>
        <label for="category">Категорія:</label>
        <input type="text" name="category" id="category" required><br>
        <input type="submit" value="Додати">
    </form>
</body>
</html>
