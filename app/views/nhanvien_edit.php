<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Sửa thông tin nhân viên</title>
</head>
<body>
    <div class="form-container">
        <h2>Sửa thông tin nhân viên</h2>
        <form method="post" action="index.php?action=update_nv" class="edit-employee-form">
            <input type="hidden" name="manv" value="<?= htmlspecialchars($nhanvien['Ma_NV']) ?>">
            
            <div class="form-group">
                <label for="tennv">Tên nhân viên:</label>
                <input type="text" id="tennv" name="tennv" value="<?= htmlspecialchars($nhanvien['Ten_NV']) ?>" required>
            </div>

            <div class="form-group">
                <label for="phai">Giới tính:</label>
                <select id="phai" name="phai">
                    <option value="NAM" <?= $nhanvien['Phai'] == 'NAM' ? 'selected' : '' ?>>Nam</option>
                    <option value="NU" <?= $nhanvien['Phai'] == 'NU' ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="noisinh">Nơi sinh:</label>
                <input type="text" id="noisinh" name="noisinh" value="<?= htmlspecialchars($nhanvien['Noi_Sinh']) ?>" required>
            </div>

            <div class="form-group">
                <label for="maphong">Mã phòng:</label>
                <input type="text" id="maphong" name="maphong" value="<?= htmlspecialchars($nhanvien['Ma_Phong']) ?>" required>
            </div>

            <div class="form-group">
                <label for="luong">Lương:</label>
                <input type="number" id="luong" name="luong" value="<?= htmlspecialchars($nhanvien['Luong']) ?>" required>
            </div>

            <button type="submit" class="btn-update">Cập nhật</button>
        </form>
    </div>
</body>
</html>