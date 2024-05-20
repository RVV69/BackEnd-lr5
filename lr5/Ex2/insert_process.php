<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Помилка підключення: ' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("INSERT INTO tov (name, description, price, quantity, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $quantity, $category]);

    echo "Запис додано успішно! <a href='index.php'>Повернутися на головну</a>";
}
?>
