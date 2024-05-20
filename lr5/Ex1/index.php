<?php
session_start();
include 'db.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $result = $conn->query("SELECT * FROM users WHERE id = $user_id");
    $user = $result->fetch_assoc();
    echo "Вітаємо, " . $user['username'] . "! <a href='logout.php'>Вийти</a> <a href='edit_profile.php'>Редагувати профіль</a> <a href='delete_profile.php'>Видалити профіль</a>";
} else {
?>
    <h2>Вхід</h2>
    <form method="post" action="login.php">
        Логін: <input type="text" name="username" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Увійти">
    </form>
    <br>
    <a href="register.php">Реєстрація</a>
<?php
}
?>