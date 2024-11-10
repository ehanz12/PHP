<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = htmlspecialchars( $_POST['nik']);
    $nama = htmlspecialchars( $_POST['nama']);
    $jabatan = $_POST['jabatan'];
    $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $penjualan = 40; // Default penjualan

    $sql = "INSERT INTO karyawan (nik, nama, jabatan, password, penjualan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nik, $nama, $jabatan, $password, $penjualan]);

    header("Location: karyawan.php");
} else {
    $error = "nik tidak boleh sama";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahan_karyawan</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
    <form action="" method="post">
    NIK: <input type="text" name="nik"><br>
    Nama: <input type="text" name="nama"><br>
    Jabatan: 
    <select name="jabatan">
        <option value="admin">Admin</option>
        <option value="kasir">Kasir</option>
        <option value="koki">Koki</option>
    </select><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Tambah Karyawan</button>
</form>
</div>
</body>
</html>

