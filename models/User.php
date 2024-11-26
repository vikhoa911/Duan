<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $password, $email, $role) {
        if (empty($username) || empty($password) || empty($email) || empty($role)) {
            throw new InvalidArgumentException("Tất cả các trường là bắt buộc.");
        }

        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Tên đăng nhập đã tồn tại.");
        }

        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Email đã được sử dụng.");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $hashedPassword, $email, $role]);
    }

    public function login($identifier, $password) {
        if (empty($identifier) || empty($password)) {
            throw new InvalidArgumentException("Tên đăng nhập/email và mật khẩu là bắt buộc.");
        }

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$identifier, $identifier]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return $user; 
        }
        return false;
    }

    // Lấy thông tin người dùng theo ID
    public function getUserById($id) {
        if (empty($id)) {
            throw new InvalidArgumentException("ID người dùng là bắt buộc.");
        }

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy ID của người dùng theo tên đăng nhập
    public function getUserIdByUsername($username) {
        if (empty($username)) {
            throw new InvalidArgumentException("Tên đăng nhập là bắt buộc.");
        }

        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetchColumn();
    }
}
?>
