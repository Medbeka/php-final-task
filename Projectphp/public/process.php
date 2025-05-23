<?php
require_once '../classes/User.php';

$user = new User();
$username = $_POST['username'];
$password = $_POST['password'];

try {
    if ($user->signup($username, $password)) {
        echo " Signup successful! <a href='login.php'>Login now</a>";
    }
} catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo " Username already taken. <a href='signup.php'>Try another</a>";
    } else {
        echo " Error: " . $e->getMessage();
    }
}
?>