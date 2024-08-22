<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h2>Login</h2>
    <form action="authenticate.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
