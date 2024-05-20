<?php

$pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
} else {
    echo "ID працівника не вказано.";
}
?>
