<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $loker = $mysqliQuery->get_loker_by_id_perusahaan($_SESSION["id"]);
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>List Loker Perusahaan</title>
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>
    
    <div class="container">
        <div class="allDaftarLokerDiv">
            <h2>Daftar Lowongan Pekerjaan Perusahaan Anda Saat ini</h2>
            <table class="tabelAllDaftarLoker">
                <thead>
                    <tr>
                        <th >Profesi</th>
                        <th>Posisi</th>
                        <th>Gaji/Perbulan</th>
                        <th>Syarat Pendidikan</th>
                        <th>Lokasi</th>
                        <th>Usia Minimal</th>
                        <th>Usia Maksimal</th>
                        <th>Diprioritaskan Untuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loker as $row) : ?>
                        <tr>
                            <td><?php echo $row['profesi']; ?></td>
                            <td><?php echo $row['posisi']; ?></td>
                            <td><?php echo "Rp " . $row['gaji']; ?></td>
                            <td><?php echo $row['syaratpendidikan']; ?></td>
                            <td><?php echo $row['lokasi']; ?></td>
                            <td><?php echo $row['usiamin']; ?></td>
                            <td><?php echo $row['usiamax']; ?></td>
                            <td><?php echo $row['prioritasgender']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>