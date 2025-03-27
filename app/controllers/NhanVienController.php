<?php
require_once './app/models/NhanVienModel.php';

class NhanVienController
{
    public function __construct()
    {
        // session chỉ gọi 1 lần ở constructor
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $isAdmin = ($_SESSION['user']['role'] === 'admin');
        $model = new NhanVienModel();

        // Phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $limit = 5;
        $start = ($page - 1) * $limit;

        $total = $model->getTotalNhanVien();
        $totalPages = ceil($total / $limit);

        $dsNhanVien = $model->getListNhanVien($start, $limit);

        require './app/views/nhanvien_list.php';
    }

    public function addForm()
    {
        $this->checkAdmin();
        require './app/views/nhanvien_add.php';
    }

    public function store()
    {
        $this->checkAdmin();
        $model = new NhanVienModel();
        $model->add($_POST['manv'], $_POST['tennv'], $_POST['phai'], $_POST['noisinh'], $_POST['maphong'], $_POST['luong']);
        header('Location: index.php?action=nhanvien');
    }



    public function delete()
    {
        $this->checkAdmin();
        $model = new NhanVienModel();
        $model->delete($_GET['id']);
        header('Location: index.php?action=nhanvien');
    }

    public function editForm()
    {
        $this->checkAdmin();
        $model = new NhanVienModel();
        $nhanvien = $model->getById($_GET['id']);
        require './app/views/nhanvien_edit.php';
    }

    public function update()
    {
        $this->checkAdmin();
        $model = new NhanVienModel();
        $model->update(
            $_POST['manv'],
            $_POST['tennv'],
            $_POST['phai'],
            $_POST['noisinh'],
            $_POST['maphong'],
            $_POST['luong']
        );
        header('Location: index.php?action=nhanvien');
    }


    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            die("Bạn không có quyền!");
        }
    }
}
