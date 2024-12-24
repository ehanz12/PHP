<?php
// Fungsi untuk memeriksa apakah sebuah bilangan adalah bilangan prima
function isPrime($num) {
    if ($num <= 1) return false; // 0 dan 1 bukan bilangan prima
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false; // Jika habis dibagi angka lain, bukan bilangan prima
        }
    }
    return true;
}

// Rentang angka yang akan diperiksa
$start =$_POST["bill1"];
$end =$_POST["bill2"];



// Looping untuk memeriksa bilangan prima dalam rentang

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prima</title>
</head>
<body>
    <h1>Bilangan primanya</h1><hr>
    <?php 
    if($start == $end ) {
        echo "<p style='color=red'>bilangan tidak boleh sama</p>";
    }elseif($start >= $end){
       echo "<p style='color=red'>bilangan harus dari yang terkecil</p>";
    }else{
        for ($i = $start; $i <= $end; $i++) {
            if (isPrime($i)) {
                echo $i . " ";
            }
        }
    }
    
    ?>
</body>
</html>