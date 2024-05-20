<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $user_name, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if ($user_id) {
        echo "User found: ID = $user_id, Username = $user_name<br>";
    } else {
        echo "User not found<br>";
    }

    if ($user_id) {
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php");
            exit;
        } else {
          $us = password_verify($password,  $hashed_password);
            echo "Incorrect password!<br> password_verify($password,  $hashed_password)";
        }
    } else {
        echo "Невірний логін або пароль! <a href='index.php'>Спробувати ще раз</a>";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
