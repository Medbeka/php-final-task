<?php
require_once '../classes/User.php';
session_start(); // Start session at the very beginning

$user = new User();
$username = $_POST['username'];
$password = $_POST['password'];

// Check if user exists
$stmt = $user->getDb()->conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password_hash'])) {
        // Password is correct — start session and redirect
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "❌ Wrong password. <a href='login.php'>Try again</a>";
    }
} else {
    echo "❌ User not found. <a href='signup.php'>Sign Up</a>";
}
?>
