<?php
include 'koneksi.php';

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $sql = "DELETE FROM karyawan WHERE nik = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nik]);

    header("Location: karyawan.php");
}
?>
