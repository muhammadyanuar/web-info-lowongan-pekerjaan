<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $pelamar_age = $mysqliQuery->get_pencari_kerja_age_by_id_pencari_kerja($_POST['id_pelamar']);
    $pelamar_gender = $mysqliQuery->get_pencari_kerja_gender_by_id_pencari_kerja($_POST['id_pelamar']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelamar</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <form action="read_file.php" method="post" target="__blank">
            <table>
                <tr>
                    <td>ID Pelamar</td>
                    <td><?php echo $_POST['id_pelamar']; ?></td>
                </tr>
                <tr>
                    <td>Nama Pelamar</td>
                    <td><?php echo $_POST['nama_pelamar']; ?></td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td><?php echo $pelamar_age; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $pelamar_gender; ?></td>
                </tr>
                <tr>
                    <td>Profesi yang dilamar</td>
                    <td><?php echo $_POST['profesi']; ?></td>
                </tr>
                <tr>
                    <td>Posisi yang dilamar</td>
                    <td><?php echo $_POST['posisi']; ?></td>
                </tr>
                <tr>
                    <td>File CV</td>
                    <td>
                        <button type="submit" name="lihat_file_pdf" value="<?php echo $_POST['file_cv']; ?>">lihat</button>
                    </td>
                </tr>
                <tr>
                    <td>File Scan KTP</td>
                    <td>
                        <button type="submit" name="lihat_file_pdf" value="<?php echo $_POST['file_scan_ktp']; ?>">lihat</button>     
                    </td>
                </tr>
                <tr>
                    <td>File Ijazah</td>
                    <td>
                        <button type="submit" name="lihat_file_pdf" value="<?php echo $_POST['file_ijazah']; ?>">lihat</button> 
                    </td>
                </tr>
                <tr>
                    <td>File Pass Foto</td>
                    <td>
                        <button type="submit" name="lihat_file_jpg" value="<?php echo $_POST['file_pass_foto']; ?>">lihat</button>      
                    </td>
                </tr>
                <tr>
                    <td>File Sertifikat</td>
                    <td>
                        <?php if (empty($_POST['file_sertifikat'])) : ?>
                            tidak ada
                        <?php else : ?>
                            <button type="submit" name="lihat_file_pdf" value="<?php echo $_POST['file_sertifikat']; ?>">lihat</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>File Portfolio</td>
                    <td>
                        <?php if (empty($_POST['file_portfolio'])) : ?>
                            tidak ada
                        <?php else : ?>
                            <button type="submit" name="lihat_file_pdf" value="<?php echo $_POST['file_portfolio']; ?>">lihat</button>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Alasan</td>
                    <td><?php echo $_POST['alasan']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo $_POST['status']; ?></td>
                </tr>
            </table>
        </form>
        <a href="list_pelamar.php">Kembali</a>
    </div>
</body>
</html>

