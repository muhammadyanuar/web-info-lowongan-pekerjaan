<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/MysqliQuery.php');
    $mysqliQuery = new MysqliQuery();
    $pencari_kerja_age = $mysqliQuery->get_pencari_kerja_age_by_id_pencari_kerja($_SESSION['id']);
    $pencari_kerja_gender = $mysqliQuery->get_pencari_kerja_gender_by_id_pencari_kerja($_SESSION['id']);
    $loker = $mysqliQuery->get_loker();

    $reset = false;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["searchresult"]) && isset($_GET["category"])) {
            $loker = $mysqliQuery->get_loker_by_keyword_and_category($_GET["searchresult"], $_GET["category"]);
            $reset = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>List Loker</title>
</head>
<body class="bg-warna-4">
    <?php require_once('./php/template/navbar.php'); ?>
    
    <div class="container">
        <div class="allDaftarLokerDiv">
            <h2>Daftar Lowongan Pekerjaan</h2>

            <form action="" method="get">
                <select name="category">
                    <option value="nama">Nama Perusahaan</option>
                    <option value="profesi">Profesi</option>
                    <option value="posisi">Posisi</option>
                    <option value="gaji">Gaji</option>
                    <option value="syaratpendidikan">Syarat Pendidikan</option>
                    <option value="lokasi">Lokasi</option>
                    <option value="usiamin">Usia Minimal</option>
                    <option value="usiamax">Usia Maksimal</option>
                    <option value="prioritasgender">Gender</option>
                </select>
                
                <input type="text" name="searchresult" id="">
                <input type="submit" value="Submit">

                <?php if ($reset == true) { echo "<a href='list_loker.php' class='reset'>Reset</a>"; } ?>
            </form>
        </div>

        <table class="tabelAllDaftarLoker">
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($loker as $row) : ?>
                <tr>
                    <?php 
                        $status_lamaran = $mysqliQuery->get_status_lamaran_by_id_pekerja_and_id_loker($_SESSION['id'], $row['id']);
                        $status_lamaran = !empty($status_lamaran) ? $status_lamaran[0]['status'] : null;
                        $gender_priority_met = ($pencari_kerja_gender == $row["prioritasgender"]) || ($row["prioritasgender"] == 'Tidak Ada');
                        $age_priority_met = ($pencari_kerja_age >= $row['usiamin']) && ($pencari_kerja_age <= $row['usiamax']);
                    ?>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['profesi']; ?></td>
                    <td><?php echo $row['posisi']; ?></td>
                    <td>Rp. <?php echo $row['gaji']; ?></td>
                    <td><?php echo $row['syaratpendidikan']; ?></td>
                    <td><?php echo $row['lokasi']; ?></td>
                    <td><?php echo $row['usiamin']; ?></td>
                    <td><?php echo $row['usiamax']; ?></td>
                    <td><?php echo $row['prioritasgender']; ?></td>
                    <?php if (is_null($status_lamaran)) : ?>
                        <?php if ($age_priority_met && $gender_priority_met) : ?>
                            <td>
                                <form action="apply.php" method="post">
                                    <input type="hidden" name="id_loker" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="id_perusahaan" value="<?php echo $row['id_perusahaan']; ?>">
                                    <button type="submit" name="apply_btn">Apply</button>
                                </form>  
                            </td>
                        <?php elseif (!$age_priority_met) : ?>
                            <td>Syarat umur tidak memenuhi</td>
                        <?php elseif (!$gender_priority_met) : ?>
                            <td>Syarat gender tidak memenuhi</td>
                        <?php else : ?>
                            <td>Syarat umur dan gender tidak memenuhi</td>
                        <?php endif; ?>
                    <?php else : ?>
                        <td class="<?php echo $status_lamaran; ?>"><?php echo $status_lamaran; ?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
</body>
</html>