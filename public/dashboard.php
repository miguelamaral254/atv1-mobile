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
    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="d-flex flex-column align-items-center">
            <h2 class="text-center">Bem vindo, <?= htmlspecialchars($user['name']) ?></h2>
            <h3 class="text-center">Suas informações:</h3>
            <?php if ($user['photo']): ?>
                <img src="../uploads/user_photos/<?= htmlspecialchars($user['photo']) ?>" alt="Photo" class="img-fluid mb-3" style="max-width: 100px;">
            <?php endif; ?>
            <p class="text-center">Nome: <?= htmlspecialchars($user['name']) ?></p>
            <p class="text-center">Email: <?= htmlspecialchars($user['email']) ?></p>
            <p class="text-center">Descrição: <?= htmlspecialchars($user['description']) ?></p>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
