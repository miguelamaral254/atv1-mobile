<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin']; // Assume you have an 'is_admin' field
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label><br>
            <input type="email" name="email" required><br>
            
            <label for="password">Password:</label><br>
            <input type="password" name="password" required><br><br>
            
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
