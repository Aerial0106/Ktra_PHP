<h2>Đăng ký tài khoản</h2>
<form method="POST" action="index.php?action=register_process">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Fullname: <input type="text" name="fullname" required><br>
    Email: <input type="email" name="email" required><br>
    Role:
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Register</button>
</form>