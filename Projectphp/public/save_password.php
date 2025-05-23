<?php
session_start();
require_once '../classes/User.php';
require_once '../classes/Encryption.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user = new User();
$db = $user->getDb()->conn;

// Get user info from database
$stmt = $db->prepare("SELECT id, encrypted_key FROM users WHERE username = ?");
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

$userId = $row['id'];
$encryptedKey = $row['encrypted_key'];
$plainPassword = $_POST['plain_password'];
$site = $_POST['site'];
$password = $_POST['password'];

$enc = new Encryption();
$key = $enc->decrypt($encryptedKey, $plainPassword); // Get real key
$encryptedPassword = $enc->encrypt($password, $key); // Encrypt password

// Save in DB
$stmt = $db->prepare("INSERT INTO passwords (user_id, site_name, encrypted_password) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $userId, $site, $encryptedPassword);
$stmt->execute();

echo "✅ Password saved for $site. <a href='dashboard.php'>Back</a>";
?>
