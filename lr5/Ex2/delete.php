<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Помилка підключення: ' . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delete_id = $_POST['delete_id'];

    $stmt = $pdo->prepare("DELETE FROM tov WHERE id = ?");
    $stmt->execute([$delete_id]);

    echo "Запис видалено успішно! <a href='index.php'>Повернутися на головну</a>";
}
?>
