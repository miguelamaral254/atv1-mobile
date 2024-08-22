<?php
include __DIR__ . '/../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <h1>Welcome to the Application</h1>
    <?php if (!isset($_SESSION['user_id'])): ?>
        <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
    <?php else: ?>
        <p><a href="dashboard.php">Dashboard</a></p>
    <?php endif; ?>
</body>
</html>
<?php
include __DIR__ . '/../includes/footer.php';
?>
