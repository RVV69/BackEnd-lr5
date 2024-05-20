<?php

$pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->execute([$name, $position, $salary]);

    header("Location: index.php");
    exit;
}
?>
