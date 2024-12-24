<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>
    <h1>Data Buku</h1>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kodebuku =$_POST ["kodebuku"];
        $judul =$_POST ["judul"];
        $penulis =$_POST ["penulis"];
        $cetakan =$_POST ["cetakan"];
        $tahun =$_POST ["tahun"];

        $conn = mysqli_connect("localhost", "root", "", "DataBuku");

        if($conn){

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

            $strsql = "INSERT INTO  buku (kodebuku, judul, penulis, cetakan, tahun) VALUES ('$kodebuku', '$judul', '$penulis', '$cetakan', '$tahun')";
            $outputquery = mysqli_query($conn, $strsql);
        
            echo " Data Buku Berhasil Ditambahkan !";
            mysqli_close($conn);
        }
        else{
            echo " server tidak terkoneksi";
        }
    }
?>

<button style="margin-top: 20px;"><a href="listBuku.php">Kembali</a></button>
</body>
</html>