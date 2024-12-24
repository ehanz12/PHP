<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Buku</title>
</head>
<body>
    <h1>Tambahkan Buku</h1>
    <form action="hasilTambah.php" method="POST">
        kode Buku   ? <input type="text" name="kodebuku" size="9"><br>
        Judul       ? <input type="text" name="judul" size="50"><br>
        Penulis     ? <input type="text" name="penulis" size="50"><br>
        Cetakan     ? <input type="text" name="cetakan" size="20"> <br>
        Tahun       ? <input type="text" name="tahun" size="4"><br>
        <input type="submit" value="Tambahkan">
    </form>
</body>
</html>