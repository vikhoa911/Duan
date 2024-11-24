<?php

class UserController {
    private $userModel;
    private $cartModel;

    public function __construct($userModel, $cartModel) {
        $this->userModel = $userModel;
        $this->cartModel = $cartModel;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $email = $_POST['email'] ?? '';
            $role = $_POST['role'] ?? 'user';

            try {
                $this->userModel->register($username, $password, $email, $role);
                header('Location: index.php?action=login');
                exit();
            } catch (Exception $e) {
                $error_message = "Lỗi: " . htmlspecialchars($e->getMessage());
                include '../views/user/register.php';
            }
        } else {
            include '../views/user/register.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                if ($user['role'] === 'admin') {
                    header('Location: index.php?action=admin_dashboard');
                } else {
                    header('Location: index.php?action=profile');
                }
                exit();
            } else {
                $error_message = "Đăng nhập thất bại";
                include '../views/user/login.php';
            }
        } else {
            include '../views/user/login.php';
        }
    }

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($userId);
        $cartItems = $this->cartModel->getCartItems($userId);
        $totalPrice = array_sum(array_column($cartItems, 'price'));

        include '../views/user/profile.php';
    }

    public function adminDashboard() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?action=login');
            exit();
        }

        include '../views/admin/dashboard.php';
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}
?>
