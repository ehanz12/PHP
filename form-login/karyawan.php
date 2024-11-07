<?php
include 'koneksi.php';

$sql = "SELECT * FROM karyawan";
$stmt = $pdo->query($sql);
$karyawan = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<nav class="navbar">
        <div class="navbar-left">
            <span><a href="dashboard.php" class="home">Cafe Saya</a></span>
            <span><a href="#">Karyawan</a></span>
        </div>
        <div class="navbar-right">
            <div class="dropdown">
                <span><?php echo $_SESSION['username']; ?></span>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

<center><h1> Daftar Karyawan</h1></center>
<a href="tambah_karyawan.php" style="font-size: 20px;" class="tmbh_karyawan">Tambah Karyawan</a>
<div class="card-container">
<table border="1" cellpadding="5" cellspacing="1" cellmargin="5">
    <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Penjualan</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($karyawan as $k): ?>
    <tr>
        <td><?= $k['nik'] ?></td>
        <td><?= $k['nama'] ?></td>
        <td><?= $k['jabatan'] ?></td>
        <td><?= $k['penjualan'] ?></td>
        <td class="aksi">
            <a href="edit_karyawan.php?nik=<?= $k['nik'] ?>">Edit</a>
            <a href="hapus_karyawan.php?nik=<?= $k['nik'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
</html>


