<?php
    require_once('./php/logic/SessionChecker.php');
    $sessionChecker = new SessionChecker();

    require_once('./php/logic/TipsMencariPekerjaan.php');
    $tipsMencariPekerjaan = new TipsMencariPekerjaan();
    $tipsMencariPekerjaan = $tipsMencariPekerjaan->get_tips();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Tips Mencari Pekerjaan</title>
</head>
<body class="bg-warna-4">
    <?php require_once('./php/template/navbar.php'); ?>

    <div class="container">
        <div class="allTipsDiv">
            <h2>Tips Mencari Pekerjaan</h2>
            <?php
                $counter = 0;
                foreach ($tipsMencariPekerjaan as $row) {
                    echo "<p>" . $row . "</p>";
                    $counter++;
                    if ($counter >= 3) {
                        break;
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>