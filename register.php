<?php
session_start();
include 'db.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $description = $_POST['description'];
    $photo = null;

    if (!empty($_FILES['photo']['name'])) {
        $photo = 'uploads/' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, description, photo) VALUES (:name, :email, :password, :description, :photo)");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'description' => $description,
        'photo' => $photo
    ]);

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post" enctype="multipart/form-data">
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
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
