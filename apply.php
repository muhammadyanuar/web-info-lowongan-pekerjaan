<?php
require_once('./php/logic/SessionChecker.php');
$sessionChecker = new SessionChecker();

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["submit"])) {
    if (isset($_POST["id_perusahaan"]) && isset($_POST["id_loker"])) {
        require_once('./php/logic/Apply.php');
        $apply = new Apply(
            $_SESSION["id"], 
            $_POST["id_perusahaan"], 
            $_POST["id_loker"], 
            $_FILES["file_cv"], 
            $_FILES["file_scan_ktp"], 
            $_FILES["file_ijazah"], 
            $_FILES["file_pass_foto"], 
            $_FILES["file_sertifikat"], 
            $_FILES["file_portfolio"],
            $_POST["alasan"]
        );
        echo $apply->get_message();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Data</title>
    <link rel="stylesheet" href="css/apply.css">
</head>
<body class="bg-warna-4">
    <div class="container">
        <h2>Upload Data Yang Diperlukan</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="">CV (pdf, max 5mb)</label><br><br>
            <input type="file" name="file_cv" accept=".pdf" required><br><br>

            <label for="">Scan KTP (pdf, max 5mb)</label><br><br>
            <input type="file" name="file_scan_ktp" accept=".pdf" required><br><br>

            <label for="">Ijazah (pdf, max 5mb)</label><br><br>
            <input type="file" name="file_ijazah" accept=".pdf" required><br><br>
            
            <label for="">Pass Foto (jpg, max 5mb, 3x4)</label><br><br>
            <input type="file" name="file_pass_foto" accept=".jpg" required><br><br>

            <label for="">Sertifikat (pdf, max 5mb, opsional)</label><br><br>
            <input type="file" name="file_sertifikat" accept=".pdf"><br><br>

            <label for="">Portfolio (pdf, max 5mb, opsional)</label><br><br>
            <input type="file" name="file_portfolio" accept=".pdf"><br><br>

            <label for="">Alasan anda memilih melamar pekerjaan ini</label><br><br>
            <textarea name="alasan" id="" required></textarea><br><br>

            <input type='hidden' name='id_loker' value='<?php echo $_POST['id_loker']; ?>'>
            <input type='hidden' name='id_perusahaan' value='<?php echo $_POST['id_perusahaan']; ?>'>

            <button type="submit" name="submit" value="1">Upload</button>
        </form>

        <a href="list_loker.php" class="cancel">Batal</a>
    </div>
</body>
</html>
