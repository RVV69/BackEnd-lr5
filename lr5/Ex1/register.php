<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();

    if ($user_id) {
        echo "Користувач з таким логіном вже існує!";
    } else {
   
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        if ($stmt->execute()) {
            echo "Реєстрація успішна! <a href='index.php'>На головну</a>";
        } else {
            echo "Помилка при реєстрації!";
        }
    }

    $stmt->close();
} else {
?>
    <h2>Реєстрація</h2>
    <form method="post" action="">
        Логін: <input type="text" name="username" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Зареєструватись">
    </form>
<?php
}
?>
