<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/login_style.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="index.php?action=login" class="login-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="login" class="btn-login">Đăng nhập</button>

            <p class="register-link">Chưa có tài khoản? <a href="index.php?action=register">Đăng ký ngay</a></p>
        </form>
    </div>
</body>
</html>