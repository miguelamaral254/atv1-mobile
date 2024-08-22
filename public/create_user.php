<?php
include __DIR__ . '/../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
    <h1>Register</h1>
    <form action="create_user.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>

        <label for="description">Description:</label><br>
        <textarea name="description"></textarea><br>

        <label for="photo">Photo:</label><br>
        <input type="file" name="photo"><br><br>

        <button type="submit" name="register">Register</button>
    </form>
    <p><a href="login.php">Login</a></p>
</body>
</html>
<?php
include __DIR__ . '/../includes/footer.php';
?>
