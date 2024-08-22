<?php
include __DIR__ . '/../src/controllers/UserController.php';

class UserService {
    private $userController;

    public function __construct() {
        $this->userController = new UserController();
    }

    public function registerUser($name, $email, $password, $description, $photo) {
        $this->userController->register($name, $email, $password, $description, $photo);
    }

    public function authenticateUser($email, $password) {
        return $this->userController->login($email, $password);
    }

    public function getUserById($id) {
        return $this->userController->getUserById($id);
    }
}
?>
