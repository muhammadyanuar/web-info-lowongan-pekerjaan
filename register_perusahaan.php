<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./php/logic/Register.php');
    $register = new Register();
    $result = $register->register_perusahaan(
        $_POST['nama'], 
        $_FILES['foto_profil_perusahaan'], 
        $_POST['email'], 
        $_POST['password'], 
        $_POST['konfirmasi_password']
    );
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
        <div class="video-background">
            <video autoplay muted loop id="vidbg">
                <source src="vidbglogin.mp4" type="video/mp4">
            </video>
        </div>
    <form action="register_perusahaan.php" method="post" enctype="multipart/form-data">
        <section>
            <div>
                <label for="">Nama Perusahaan</label>
                <input type="text" name="nama" required>
            </div>
            <div>
                <label for="">Foto Profil (png, max 5mb)</label>
                <input type="file" name="foto_profil_perusahaan" accept=".png" required>
            </div>
            <div>
                <label for="">Email Perusahaan</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="">Konfirmasi Password</label>
                <input type="password" name="konfirmasi_password" required>
            </div>
        </section>
        <button type="submit">REGISTER</button>
        <p>Sudah mempunyai akun perusahaan? <a href="login.php">Login</a></p>
    </form>
            <div class="logo-container">
                <img src="joblogo.png" alt="Logo">
            </div>
</body>
</html>
