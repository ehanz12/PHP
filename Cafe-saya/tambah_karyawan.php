<?php
// Koneksi ke database
// include 'koneksi.php';
$conn = new mysqli('localhost', 'root', '', 'database');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    // Cek apakah NIK sudah ada di database
    $checkNikQuery = "SELECT * FROM karyawan WHERE nik = '$nik'";
    $checkNikResult = mysqli_query($conn, $checkNikQuery);

    if (mysqli_num_rows($checkNikResult) > 0) {
        // Jika NIK sudah ada, tampilkan pesan error
        $error = "NIK sudah Terdaftar !";
    } else {
        // Jika NIK belum ada, simpan data ke database
        $query = "INSERT INTO karyawan (nik, nama, jabatan, password, penjualan) VALUES ('$nik', '$nama', '$jabatan', '$password', 40)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect ke dashboard jika berhasil
            header("Location: karyawan.php");
            exit();
        } else {
            echo "Gagal menambahkan data karyawan!";
        }
    }
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
        <h1 style="font-family: Arial,black;">Tambahkan Karyawan</h1>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    NIK: <input type="text" name="nik" required><br>
    Nama: <input type="text" name="nama" required><br>
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


