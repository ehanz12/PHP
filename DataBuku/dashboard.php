<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBuku</title>
</head>
<body>
    <h1>Lihat Data Buku</h1>
    <hr>
    <br>
    <button style="margin-bottom: 10px;"><a href="TambahBuku.php">Tambahkan Buku Disini</a></button>
    <br>
    <?php

$conn = mysqli_connect("localhost", "root", "", "DataBuku");

if($conn) {
    $outputquery = mysqli_query($conn, "SELECT * from buku");
    $kolom = mysqli_fetch_row($outputquery);

    if($kolom){
        do {
            list ($kodebuku,$judul, $penulis, $cetakan, $tahun) =$kolom;

            echo "Kode Buku : $kodebuku";
            echo "<br>";
            echo "Judul     : $judul";
            echo "<br>";
            echo "Penulis   : $penulis";
            echo "<br>";
            echo "Cetakan   : $cetakan";
            echo "<br>";
            echo "Tahun     : $tahun";
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }
        while ($kolom = mysqli_fetch_row($outputquery));
    }else {
        echo "Belum Ada Data Buku Yang Tersimpan";
        echo "<br>";
    }
    mysqli_close($conn);
}

?>
</body>
</html>