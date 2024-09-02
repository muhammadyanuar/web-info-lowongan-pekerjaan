<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['id_pencari_kerja']) && isset($_POST['perusahaan_action'])) {
            require_once('./php/logic/Lamaran.php');
            $lamaran = new Lamaran();
            $lamaran->set_status($_POST['id_pencari_kerja'], $_POST['id_loker'], $_POST['perusahaan_action']);
        }
        
        if (isset($_POST["lihat_file_pdf"])) {
            require_once('./php/logic/ReadPDF.php');
            $readPDF = new ReadPDF($_POST['lihat_file_pdf']);
        } elseif (isset($_POST["lihat_file_jpg"])) {
            require_once('./php/logic/ReadJPG.php');
            $readPDF = new ReadJPG($_POST['lihat_file_jpg']);
        }
    }
?>