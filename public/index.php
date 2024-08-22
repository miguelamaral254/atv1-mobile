<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>Welcome to the Application</h1>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
        <?php else: ?>
            <p><a href="dashboard.php">Dashboard</a></p>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS and dependencies via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
