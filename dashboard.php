<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user information
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Dashboard</h2>
        <p>Welcome, <?= htmlspecialchars($user['name']) ?>!</p>
        <p>Email: <?= htmlspecialchars($user['email']) ?></p>
        <p>Description: <?= htmlspecialchars($user['description']) ?></p>
        <p><img src="<?= htmlspecialchars($user['photo']) ?>" alt="Photo" width="100"></p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
