<?php
session_start();
require_once '../classes/PasswordGenerator.php';

// Set default values if fields are empty
$length   = $_POST['length']   ?? 12;
$lower    = $_POST['lower']    ?? 3;
$upper    = $_POST['upper']    ?? 3;
$numbers  = $_POST['numbers']  ?? 2;
$symbols  = $_POST['symbols']  ?? 2;

$generator = new PasswordGenerator();
$password = $generator->generate($length, $lower, $upper, $numbers, $symbols);

// Store password in session to display on dashboard
$_SESSION['generated_password'] = $password;
header("Location: dashboard.php");
exit();
?>