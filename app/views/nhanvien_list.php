<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Thông tin nhân viên</title>
</head>
<body>
<?php
// Fix an toàn khi biến chưa được truyền từ controller
$isAdmin = $isAdmin ?? false;
?>

<?php if ($isAdmin): ?>
    <p style="text-align:center;">
        <a href="index.php?action=them_nv" class="btn-add">Thêm nhân viên</a>
    </p>
<?php endif; ?>

<h2>THÔNG TIN NHÂN VIÊN</h2>
<p>
    Xin chào, <?= htmlspecialchars($_SESSION['user']['username']) ?> |
    <a href="index.php?action=logout" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất?')">Đăng xuất</a>
</p>

<table>
    <tr>
        <th>Mã NV</th>
        <th>Tên NV</th>
        <th>Giới tính</th>
        <th>Nơi sinh</th>
        <th>Phòng</th>
        <th>Lương</th>
        <?php if ($isAdmin): ?>
            <th>Hành động</th>
        <?php endif; ?>
    </tr>

    <?php foreach ($dsNhanVien as $nv): ?>
        <tr>
            <td><?= htmlspecialchars($nv['Ma_NV']) ?></td>
            <td><?= htmlspecialchars($nv['Ten_NV']) ?></td>
            <td>
                <?php if ($nv['Phai'] == 'NU'): ?>
                    <img src="public/images/woman.jpg" width="30">
                <?php else: ?>
                    <img src="public/images/man.jpg" width="30">
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($nv['Noi_Sinh']) ?></td>
            <td><?= htmlspecialchars($nv['Ten_Phong']) ?></td>
            <td><?= number_format($nv['Luong']) ?></td>

            <?php if ($isAdmin): ?>
                <td>
                    <a href="index.php?action=sua_nv&id=<?= $nv['Ma_NV'] ?>">Sửa</a>
                    <a href="index.php?action=xoa_nv&id=<?= $nv['Ma_NV'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<!-- PHÂN TRANG -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="index.php?action=nhanvien&page=<?= $page - 1 ?>">Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <?php if ($i == $page): ?>
            <strong><?= $i ?></strong>
        <?php else: ?>
            <a href="index.php?action=nhanvien&page=<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
        <a href="index.php?action=nhanvien&page=<?= $page + 1 ?>">Next</a>
    <?php endif; ?>
</div>

</body>
</html>