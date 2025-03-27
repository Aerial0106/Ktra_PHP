<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/add_style.css">
    <title>Thêm Nhân Viên</title>
</head>
<body>
    <div class="form-container">
        <h2>Thêm Nhân Viên</h2>
        <form method="post" action="index.php?action=store_nv" class="add-employee-form">
            <div class="form-group">
                <label for="manv">Mã nhân viên:</label>
                <input type="text" id="manv" name="manv" required>
            </div>

            <div class="form-group">
                <label for="tennv">Tên nhân viên:</label>
                <input type="text" id="tennv" name="tennv" required>
            </div>

            <div class="form-group">
                <label for="phai">Giới tính:</label>
                <select id="phai" name="phai">
                    <option value="NAM">Nam</option>
                    <option value="NU">Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="noisinh">Nơi sinh:</label>
                <input type="text" id="noisinh" name="noisinh" required>
            </div>

            <div class="form-group">
                <label for="maphong">Mã phòng:</label>
                <input type="text" id="maphong" name="maphong" required>
            </div>

            <div class="form-group">
                <label for="luong">Lương:</label>
                <input type="number" id="luong" name="luong" required>
            </div>

            <button type="submit" class="btn-save">Lưu</button>
        </form>
    </div>
</body>
</html>