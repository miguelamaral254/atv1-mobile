<?php
include __DIR__ . '/../includes/db.php';
include __DIR__ . '/../src/models/User.php';

class UserController {
    public function register($name, $email, $password, $description, $photo) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, description, photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $description, $photo]);
    }

    public function login($email, $password) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>
