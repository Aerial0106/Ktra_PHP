<?php

require_once './app/controllers/LoginController.php';
require_once './app/controllers/NhanVienController.php';
require_once './app/controllers/RegisterController.php';

session_start();
$action = $_GET['action'] ?? 'login';

// Nếu chưa login mà truy cập không phải login, register, register_process -> quay về login
if (!isset($_SESSION['user']) && !in_array($action, ['login', 'register', 'register_process'])) {
    header('Location: index.php?action=login');
    exit();
}

// Nếu đã login mà vào lại login thì chuyển qua trang nhân viên
if (isset($_SESSION['user']) && $action == 'login') {
    header('Location: index.php?action=nhanvien');
    exit();
}

// Điều hướng controller
// index.php (Router)
$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;
    case 'register':
        $controller = new RegisterController();
        $controller->showRegisterForm(); // ✅ đúng: show form
        break;
    case 'register_process':
        $controller = new RegisterController();
        $controller->register(); // ✅ xử lý dữ liệu khi nhấn đăng ký
        break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;
    case 'nhanvien':
        $nvController = new NhanVienController();
        $nvController->index();
        break;
    case 'them_nv':
        $nvController = new NhanVienController();
        $nvController->addForm();
        break;
    case 'store_nv':
        $nvController = new NhanVienController();
        $nvController->store();
        break;
    case 'xoa_nv':
        $nvController = new NhanVienController();
        $nvController->delete();
        break;
    case 'sua_nv':
        $nvController = new NhanVienController();
        $nvController->editForm();
        break;
    case 'update_nv':
        $nvController = new NhanVienController();
        $nvController->update();
        break;
    default:
        echo "404 Not Found";
        break;
}
