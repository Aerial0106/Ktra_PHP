<h2>Sửa thông tin nhân viên</h2>
<form method="post" action="index.php?action=update_nv">
    <input type="hidden" name="manv" value="<?= $nhanvien['Ma_NV'] ?>">
    Tên nhân viên: <input type="text" name="tennv" value="<?= $nhanvien['Ten_NV'] ?>" required><br><br>
    Giới tính:
    <select name="phai">
        <option value="NAM" <?= $nhanvien['Phai'] == 'NAM' ? 'selected' : '' ?>>Nam</option>
        <option value="NU" <?= $nhanvien['Phai'] == 'NU' ? 'selected' : '' ?>>Nữ</option>
    </select><br><br>
    Nơi sinh: <input type="text" name="noisinh" value="<?= $nhanvien['Noi_Sinh'] ?>" required><br><br>
    Mã phòng: <input type="text" name="maphong" value="<?= $nhanvien['Ma_Phong'] ?>" required><br><br>
    Lương: <input type="number" name="luong" value="<?= $nhanvien['Luong'] ?>" required><br><br>
    <button type="submit">Cập nhật</button>
</form>