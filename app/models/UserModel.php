<?php
require_once './app/config/database.php';

class UserModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // ---- Đăng nhập ----
    public function getUser($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // ---- Đăng ký ----
    public function registerUser($username, $password, $fullname, $email, $role = 'user')
    {
        // Kiểm tra username đã tồn tại chưa
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return ['status' => false, 'message' => 'Tên đăng nhập đã tồn tại!'];
        }

        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user mới
        $stmt = $this->conn->prepare("INSERT INTO user (username, password, fullname, email, role) VALUES (:username, :password, :fullname, :email, :role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return ['status' => true, 'message' => 'Đăng ký thành công!'];
        } else {
            return ['status' => false, 'message' => 'Đăng ký thất bại!'];
        }
    }
}
?>