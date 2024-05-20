<?php

$pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?");
    $stmt->execute([$name, $position, $salary, $id]);

    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
