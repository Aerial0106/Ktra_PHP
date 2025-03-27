<?php
class LoginController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new UserModel();
            $user = $model->getUser($username, $password);

            if ($user) {
                // Lưu thông tin user vào session
                $_SESSION['user'] = [
                    'username' => $user['username'],
                    'fullname' => $user['fullname'],
                    'role' => $user['role']
                ];

                // Chuyển hướng
                header('Location: index.php?action=nhanvien');
                exit();
            } else {
                echo "<script>alert('Sai tài khoản hoặc mật khẩu!');</script>";
            }
        }

        include './app/views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }

    public function register() {
        require_once './app/models/UserModel.php';
        $model = new UserModel();
    
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
    
            $result = $model->registerUser($username, $password, $fullname, $email);
    
            echo $result['message'];
            if ($result['status']) {
                echo '<br><a href="index.php?action=login">Đăng nhập ngay</a>';
            }
        }
    
        require_once './app/views/register.php';
    }    
}
?>