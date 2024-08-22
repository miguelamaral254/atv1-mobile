<?php
session_start();
require '../config/database.php';

// Diretório de uploads
$photoUploadDir = '../uploads/user_photos/';

// Verificar se o diretório existe; se não, tentar criá-lo
if (!is_dir($photoUploadDir)) {
    mkdir($photoUploadDir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se todos os campos foram preenchidos e o upload da foto foi feito
    if (isset($_POST['name'], $_POST['email'], $_POST['password']) && !empty($_FILES['photo']['name'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $description = $_POST['description'];
        $photo = $_FILES['photo'];

        // Verificar se o upload da foto foi realizado com sucesso
        if ($photo['error'] === UPLOAD_ERR_OK) {
            $photoName = basename($photo['name']);
            $photoTmpName = $photo['tmp_name'];
            $photoUploadPath = $photoUploadDir . $photoName;

            // Mover a foto para o diretório de uploads
            if (move_uploaded_file($photoTmpName, $photoUploadPath)) {
                try {
                    // Preparar e executar a inserção no banco de dados
                    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, description, photo) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$name, $email, $password, $description, $photoName]);

                    // Redirecionar após o sucesso
                    header("Location: login.php");
                    exit();
                } catch (PDOException $e) {
                    die("Erro ao criar usuário: " . $e->getMessage());
                }
            } else {
                echo "Falha ao mover a foto para o diretório de uploads.";
            }
        } else {
            echo "Erro no upload da foto: " . $photo['error'];
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
} else {
    // Redirecionar para a página de registro se não for um POST
    header("Location: register.php");
    exit();
}
?>
