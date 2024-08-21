<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1>Welcome to the Application</h1>
        <p>Navigate to register, login, or access the dashboard if you are logged in.</p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
