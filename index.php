<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
</head>

<body class="bg-office">
    <?php require_once('./php/template/navbar.php'); ?>


    <div class="container">
        <?php if ($_SESSION['role'] == 'akun_admin') : ?>
            <?php require_once('./php/template/index_admin.php'); ?>
        <?php elseif ($_SESSION['role'] == 'akun_pencari_kerja') : ?>
            <?php require_once('./php/template/index_pencari_kerja.php'); ?>
        <?php elseif ($_SESSION['role'] == 'akun_perusahaan') : ?>
            <?php require_once('./php/template/index_perusahaan.php'); ?>
        <?php endif; ?>
    </div>
    <script src="js/scirpt.js"></script>
</body>
</html>
