<?php
require_once 'Encryption.php';
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function signup($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $rawKey = bin2hex(random_bytes(16));
        $enc = new Encryption();
        $encryptedKey = $enc->encrypt($rawKey, $password);

        $stmt = $this->db->conn->prepare(
            "INSERT INTO users (username, password_hash, encrypted_key) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $username, $hashedPassword, $encryptedKey);
        return $stmt->execute();
    }

    public function getDb() {
        return $this->db;
    }

    public function usernameExists($username) {
        $stmt = $this->db->conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }
}
?>
