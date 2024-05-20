<?php

$pdo = new PDO('mysql:host=localhost;dbname=lr5;charset=utf8', 'root', '');

$sql = "SELECT AVG(salary) AS avg_salary FROM employees";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo "Середня заробітна плата всіх працівників: " . $row['avg_salary'];
?>
