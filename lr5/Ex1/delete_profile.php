<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        echo "Профіль видалено! <a href='index.php'>На головну</a>";
    } else {
        echo "Помилка при видаленні профілю!";
    }

    $stmt->close();
} else {
?>
    <h2>Видалення профілю</h2>
    <form method="post" action="">
        Ви впевнені, що хочете видалити свій профіль?<br>
        <input type="submit" value="Видалити">
    </form>
<?php
}
?>

