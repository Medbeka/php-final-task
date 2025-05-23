<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .generator { margin: 20px; padding: 20px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    
    <div class="generator">
        <h3>Password Generator</h3>
        <form method="POST" action="generate_password.php">
            Length: <input type="number" name="length" min="8" max="32" value="12"><br>
            Lowercase: <input type="number" name="lower" min="1" value="3"><br>
            Uppercase: <input type="number" name="upper" min="1" value="3"><br>
            Numbers: <input type="number" name="numbers" min="1" value="2"><br>
            Symbols: <input type="number" name="symbols" min="1" value="2"><br>
            <input type="submit" value="Generate Password">
        </form>
    </div>
<div class="generator">
    <h3>Save Password</h3>
    <form method="POST" action="save_password.php">
        Website/App Name: <input type="text" name="site" required><br>
        Password to Save: <input type="text" name="password" value="<?php echo $_SESSION['generated_password'] ?? ''; ?>" required><br>
        Your Login Password: <input type="password" name="plain_password" required><br>
        <input type="submit" value="Save Password">
    </form>
</div>


    <p><a href="logout.php">Logout</a></p>
</body>
</html>

<?php if (isset($_SESSION['generated_password'])): ?>
    <div class="generated-password" style="margin: 20px; padding: 10px; background: #f0f0f0;">
        <strong>Generated Password:</strong> 
        <?php echo htmlspecialchars($_SESSION['generated_password']); ?>
        <?php unset($_SESSION['generated_password']); // Clear after display ?>
    </div>
<?php endif; ?>