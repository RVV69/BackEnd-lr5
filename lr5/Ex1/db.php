<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lr5";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
