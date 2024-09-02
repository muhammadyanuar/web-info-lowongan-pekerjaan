<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Login.php');
    $login = new Login();
    $result = $login->login_user($_POST['role'], $_POST['email'], $_POST['password']);
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="video-background">
        <video autoplay muted loop id="vidbg">
            <source src="videobg.mp4" type="video/mp4">
        </video>
    </div>
    <div class="form-container">
        <form action="login.php" method="post">
            <section>
                <div>
                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option value="akun_pencari_kerja">Pencari Kerja</option>
                        <option value="akun_perusahaan">Perusahaan</option>
                        <option value="akun_admin">Admin</option>
                    </select>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
            </section>

            <button type="submit">LOGIN</button>
            <p>
                Belum memiliki akun? buat akun sebagai <br>
                <a href="register_pencari_kerja.php">Pencari kerja,</a>
                <a href="register_perusahaan.php">Perusahaan,</a> atau
                <a href="register_admin.php">Admin</a>
            </p>
        </form>
    </div>
    <div class="logo-container">
        <img src="joblog.png" alt="Logo">
    </div>
</body>
</html>
