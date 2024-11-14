<?php
include 'koneksi.php';

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $sql = "SELECT * FROM karyawan WHERE nik = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nik]);
    $karyawan = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $karyawan['password'];

    $sql = "UPDATE karyawan SET nama = ?, jabatan = ?, password = ? WHERE nik = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nama, $jabatan, $password, $nik]);

    header("Location: karyawan.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
    <form action="" method="post">
    <input type="hidden" name="nik" value="<?= $karyawan['nik'] ?>">
    Nama: <input type="text" name="nama" value="<?= $karyawan['nama'] ?>"><br>
    Jabatan:
    <select name="jabatan">
        <option value="admin" <?= $karyawan['jabatan'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="kasir" <?= $karyawan['jabatan'] == 'kasir' ? 'selected' : '' ?>>Kasir</option>
        <option value="koki" <?= $karyawan['jabatan'] == 'koki' ? 'selected' : '' ?>>Koki</option>
    </select><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Simpan Perubahan</button>
</form>
    </div>
</body>
</html>

