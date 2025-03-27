<?php
require_once './app/config/database.php';

class NhanVienModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection(); // PDO
    }

    public function getTotalNhanVien()
    {
        $stmt = $this->conn->query("SELECT COUNT(*) FROM nhanvien");
        return $stmt->fetchColumn();
    }

    public function getListNhanVien($start, $limit)
    {
        $stmt = $this->conn->prepare("
            SELECT nhanvien.*, Ten_Phong 
            FROM nhanvien 
            INNER JOIN phongban ON nhanvien.Ma_Phong = phongban.Ma_Phong 
            LIMIT :start, :limit
        ");
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($ma_nv, $tennv, $phai, $noisinh, $maphong, $luong)
    {
        $stmt = $this->conn->prepare("INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (:manv, :tennv, :phai, :noisinh, :maphong, :luong)");
        return $stmt->execute([
            ':manv' => $ma_nv,
            ':tennv' => $tennv,
            ':phai' => $phai,
            ':noisinh' => $noisinh,
            ':maphong' => $maphong,
            ':luong' => $luong
        ]);
    }



    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM nhanvien WHERE Ma_NV = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM nhanvien WHERE Ma_NV = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($manv, $tennv, $phai, $noisinh, $maphong, $luong)
    {
        $stmt = $this->conn->prepare("
        UPDATE nhanvien SET 
            Ten_NV = :tennv, 
            Phai = :phai, 
            Noi_Sinh = :noisinh, 
            Ma_Phong = :maphong, 
            Luong = :luong 
        WHERE Ma_NV = :manv
    ");
        return $stmt->execute([
            ':manv' => $manv,
            ':tennv' => $tennv,
            ':phai' => $phai,
            ':noisinh' => $noisinh,
            ':maphong' => $maphong,
            ':luong' => $luong
        ]);
    }
}
