<?php
require_once 'config/Database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($name, $email, $password) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Email already exists");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT id, password FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $token = bin2hex(random_bytes(16));
            setcookie('user_token', $token, time() + (86400 * 30), "/"); 
            $stmt = $this->conn->prepare("UPDATE users SET token = :token WHERE id = :id");
            $stmt->execute([':token' => $token, ':id' => $user['id']]);

            return true;
        }
        return false;
    }
    public function logout() {
        session_start();
        session_destroy();
        setcookie('user_token', '', time() - 3600, "/");
    }
}
?>
