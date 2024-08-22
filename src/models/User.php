<?php
class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $description;
    private $photo;

    // Getters e setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getPhoto() { return $this->photo; }
    public function setPhoto($photo) { $this->photo = $photo; }
}
?>
