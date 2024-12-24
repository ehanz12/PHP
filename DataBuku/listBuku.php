<?php

$conn = mysqli_connect("localhost", "root", "", "DataBuku");

$query = "SELECT * FROM buku";
$hasil = mysqli_query($conn, $query);
echo "<table border ='1'>";
echo "<tr style='text-align: center;'>
        <td>Kode Buku</td>
        <td>Judul</td>
        <td>Penulis</td>
        <td>Cetakan</td>
        <td>Tahun</td>
        <td>Action</td>
    </tr>";

    while($data = mysqli_fetch_array($hasil)){
        echo "<tr>
                <td>".$data['kodebuku']."</td>
                <td>".$data['judul']."</td>
                <td>".$data['penulis']."</td>
                <td>".$data['cetakan']."</td>
                <td>".$data['tahun']."</td>
                <td><a href ='edit.php?kodebuku".$data['kodebuku']."'>edit</a></td>
                </tr>";
    }
    echo "</table>";

?>