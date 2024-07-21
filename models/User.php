<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($data) {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (username, password, role) VALUES (?, ?, ?)");
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);
        return $stmt->execute([$data['username'], $passwordHash, $data['role']]);
    }
}
?>
