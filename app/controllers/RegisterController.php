<?php
require_once './app/models/UserModel.php';

class RegisterController
{
    public function showRegisterForm()
    {
        include './app/views/register.php';
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $role = $_POST['role']; // lấy role từ form
        
            $model = new UserModel();
            if ($model->registerUser($username, $password, $fullname, $email, $role)) {
                echo "<script>alert('Đăng ký thành công!');window.location='index.php?action=login';</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại!');window.location='index.php?action=register';</script>";
            }
        }        
    }
}
?>