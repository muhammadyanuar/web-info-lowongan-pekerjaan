<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $loker = $mysqliQuery->get_loker();
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="bg-warna-4">
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">
        <div class="historyDiv">
            <h2>History Pekerjaan Yang Telah Dilamar</h2>
            <table class="tabelHistory">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Profesi</th>
                        <th>Posisi</th>
                        <th>Gaji</th>
                        <th>Syarat Pendidikan</th>
                        <th>Lokasi</th>
                        <th>Usia Minimal</th>
                        <th>Usia Maksimal</th>
                        <th>Diprioritaskan Untuk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loker as $row) : ?>
                        <?php 
                            $loker_yang_pernah_di_apply_pencari_kerja = $mysqliQuery->get_status_lamaran_by_id_pekerja_and_id_loker($_SESSION['id'], $row['id']);
                        ?>
                        <tr>
                            <?php if (!empty($loker_yang_pernah_di_apply_pencari_kerja)) : ?>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['profesi']; ?></td>
                                <td><?php echo $row['posisi']; ?></td>
                                <td><?php echo "Rp " . $row['gaji']; ?></td>
                                <td><?php echo $row['syaratpendidikan']; ?></td>
                                <td><?php echo $row['lokasi']; ?></td>
                                <td><?php echo $row['usiamin']; ?></td>
                                <td><?php echo $row['usiamax']; ?></td>
                                <td><?php echo $row['prioritasgender']; ?></td>
                                <td class="<?php echo $loker_yang_pernah_di_apply_pencari_kerja[0]['status']; ?>">
                                    <?php echo $loker_yang_pernah_di_apply_pencari_kerja[0]['status']; ?>
                                </td>                            
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
