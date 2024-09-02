<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('./php/logic/TambahLoker.php');
        $tambahLoker = new TambahLoker();
        $tambahLoker->insertDataLoker(
            $_POST['profesi'],
            $_POST['posisi'],
            $_POST['gaji'],
            $_POST['syaratpendidikan'],
            $_POST['lokasi'],
            $_POST['usiamin'],
            $_POST['usiamax'],
            $_POST['prioritasgender'],
            $_SESSION['id']
        );
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Tambah Loker</title>
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">

        <form action="" method="post" class="formTambahLoker">
            <h2>Tambah Lowongan Pekerjaan</h2>

            <label for="profesi">Profesi</label><br>
            <input type="text" id="profesi" name="profesi" required><br>

            <label for="posisi">Posisi</label><br>
            <input type="text" id="posisi" name="posisi" required><br>

            <label for="gaji">Gaji</label><br>
            <input type="text" id="gaji" name="gaji" required><br>

            <label for="syaratpendidikan">Syarat Pendidikan</label><br>
            <input type="text" id="syaratpendidikan" name="syaratpendidikan" required><br>

            <label for="lokasi">Lokasi</label><br>
            <input type="text" id="lokasi" name="lokasi" required><br>

            <label for="usiamin">Usia Minimal</label><br>
            <input type="number" id="usiamin" name="usiamin" required><br>

            <label for="usiamax">Usia Maximal</label><br>
            <input type="number" id="usiamax" name="usiamax" required><br>

            <label for="prioritasgender">Prioritas Gender</label><br>
            <select id="prioritasgender" name="prioritasgender" required>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
                <option value="Tidak Ada">Tidak ada</option>
            </select><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>