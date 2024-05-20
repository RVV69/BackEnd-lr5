<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $hashed_password, $user_id);
    if ($stmt->execute()) {
        echo "Профіль оновлено! <a href='index.php'>На головну</a>";
    } else {
        echo "Помилка при оновленні профілю!";
    }

    $stmt->close();
} else {
    $stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
?>
    <h2>Редагування профілю</h2>
    <form method="post" action="">
        Логін: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Оновити">
    </form>
<?php
    $stmt->close();
}
?>
