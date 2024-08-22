<?php
session_start();
require '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h2>Welcome, <?= htmlspecialchars($user['name']) ?></h2>
    <h3>Your Information</h3>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <p>Description: <?= htmlspecialchars($user['description']) ?></p>
    <?php if ($user['photo']): ?>
        <img src="../uploads/user_photos/<?= htmlspecialchars($user['photo']) ?>" alt="Photo" width="100">
    <?php endif; ?>
</body>
</html>
