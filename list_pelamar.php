<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $pelamar = $mysqliQuery->get_pelamar_by_id_perusahaan($_SESSION['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['perusahaan_action'])) { 
            require_once('./php/logic/Lamaran.php');
            $lamaran = new Lamaran();
            if ($_POST['perusahaan_action'] === 'diterima') {
                $lamaran->set_status($_POST['id_pelamar'], $_POST['id_loker'], 'diterima');
            } elseif ($_POST['perusahaan_action'] === 'ditolak') {
                $lamaran->set_status($_POST['id_pelamar'], $_POST['id_loker'], 'ditolak');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pelamar</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">
        <div class="historyDiv">
            <h2>List Pelamar</h2>
            <table class="tabelHistory">
                <thead>
                    <tr>
                        <th>Waktu Melamar</th>
                        <th>ID Pelamar</th>
                        <th>Nama Pelamar</th>
                        <th>Profesi</th>
                        <th>Posisi</th>
                        <th>Data Pelamar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pelamar as $row) : ?>
                        <tr>
                            <td><?php echo $row["waktu_melamar"]; ?></td>
                            <td><?php echo $row["id_pencari_kerja"]; ?></td>
                            <td><?php echo $row["nama"]; ?></td>
                            <td><?php echo $row["profesi"]; ?></td>
                            <td><?php echo $row["posisi"]; ?></td>
                            <td>
                                <form action="lihat_data_pelamar.php" method="post">
                                    <input type="hidden" name="id_pelamar" value="<?php echo $row["id_pencari_kerja"]; ?>">
                                    <input type="hidden" name="nama_pelamar" value="<?php echo $row["nama"]; ?>">
                                    <input type="hidden" name="profesi" value="<?php echo $row["profesi"]; ?>">
                                    <input type="hidden" name="posisi" value="<?php echo $row["posisi"]; ?>">
                                    <input type="hidden" name="file_cv" value="<?php echo $row["file_cv"]; ?>">
                                    <input type="hidden" name="file_scan_ktp" value="<?php echo $row["file_scan_ktp"]; ?>">
                                    <input type="hidden" name="file_ijazah" value="<?php echo $row["file_ijazah"]; ?>">
                                    <input type="hidden" name="file_pass_foto" value="<?php echo $row["file_pass_foto"]; ?>">
                                    <input type="hidden" name="file_sertifikat" value="<?php echo $row["file_sertifikat"]; ?>">
                                    <input type="hidden" name="file_portfolio" value="<?php echo $row["file_portfolio"]; ?>">
                                    <input type="hidden" name="alasan" value="<?php echo $row["alasan"]; ?>">
                                    <input type="hidden" name="status" value="<?php echo $row["status"]; ?>">
                                    <button type="submit" name="lihat_data">Lihat Data</button>
                                </form>
                            </td>
                            <?php if ($row["status"] == "pending") : ?>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pelamar" value="<?php echo $row["id_pencari_kerja"]; ?>">
                                        <input type="hidden" name="id_loker" value="<?php echo $row["id_loker"]; ?>">
                                        <button type="submit" name="perusahaan_action" value="diterima">Terima</button>
                                        <button type="submit" name="perusahaan_action" value="ditolak">Tolak</button>
                                    </form>
                                </td>
                            <?php else : ?>
                                <td><?php echo $row["status"]; ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


