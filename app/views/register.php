<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/register_style.css">
    <title>Đăng ký tài khoản</title>
</head>
<body>
    <div class="form-container">
        <h2>Đăng ký tài khoản</h2>
        <form method="POST" action="index.php?action=register_process" class="register-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit" class="btn-register">Register</button>
        </form>
    </div>
</body>
</html>