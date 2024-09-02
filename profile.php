<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();
    $foto_profil =  $_SESSION['foto_profil'];
    $nama =  $_SESSION['nama'];

    if ($_SESSION['role'] == 'akun_pencari_kerja')  {
        $gender =  $_SESSION['gender'];
        $tanggal_lahir = $_SESSION['tanggal_lahir'];
        $usia =  $_SESSION['usia'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profil"])) {
        require_once('./php/logic/UpdateProfile.php');
        $updateProfile = new UpdateProfile();
        if  ($_SESSION['role'] == 'akun_pencari_kerja') {
            if (!empty($_FILES['foto_profil_user']['name'])) {
                $updateProfile->update_pencari_kerja_profile_with__foto_profile(
                    $_POST['nama'],
                    $_POST['tanggal_lahir'],
                    $_POST['gender'],
                    $_FILES['foto_profil_user'], 
                    $_POST['id_user']
                );
            } else {
                $updateProfile->update_pencari_kerja_profile_without__foto_profile(
                    $_POST['nama'],
                    $_POST['tanggal_lahir'],
                    $_POST['gender'],
                    $_POST['id_user']
                );
            }
        } elseif ($_SESSION['role'] == 'akun_perusahaan') {
            if (!empty($_FILES['foto_profil_user']['name'])) {
                $updateProfile->update_perusahaan_profile_with__foto_profile(
                    $_POST['nama'],
                    $_FILES['foto_profil_user'], 
                    $_POST['id_user']
                );
            } else {
                $updateProfile->update_perusahaan_profile_without__foto_profile(
                    $_POST['nama'],
                    $_POST['id_user']
                );
            }
        }  elseif ($_SESSION['role'] == 'akun_admin') {
            if (!empty($_FILES['foto_profil_user']['name'])) {
                $updateProfile->update_admin_profile_with__foto_profile(
                    $_POST['nama'],
                    $_FILES['foto_profil_user'], 
                    $_POST['id_user']
                );
            } else {
                $updateProfile->update_admin_profile_without__foto_profile(
                    $_POST['nama'],
                    $_POST['id_user']
                );
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="profile-form">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>">

            <div class="profile-pic-container">
                <img src="./uploads/foto_profil/<?php echo $_SESSION['role']; ?>/<?php echo $foto_profil; ?>" alt="Profile Picture" class="profile-pic">
                <label for="foto_profil_user" class="upload-label">Upload Profile Picture (png, max 5mb)</label>
                <input type="file" name="foto_profil_user" id="foto_profil_user" accept=".png" class="upload-input"> 
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required>
            </div>

            <?php if ($_SESSION['role'] == 'akun_pencari_kerja') : ?>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" required>
                        <option value="Pria" <?php if ($gender == 'Pria') echo 'selected'; ?>>Pria</option>
                        <option value="Wanita" <?php if ($gender == 'Wanita') echo 'selected'; ?>>Wanita</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $tanggal_lahir ?>" required>
                </div>

                <p>Usia: <span class="age"><?php echo $usia; ?></span></p>
            <?php endif; ?>

            <button type="submit" name="update_profil" class="btn-submit">Submit Perubahan</button>
            <a href="index.php" class="btn-back">Kembali ke index</a>
        </form>
    </div>
</body>
</html>
