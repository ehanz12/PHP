<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if( isset($_POST["kirim"])):?>
<h1>Hello, selamat datang <?= $_POST["nama"];?></h1>
<?php endif;?>


    <form action="" method="post">
    Masukan Nama    
    <input type="text" name="nama">
    <br>
    <button type="submit" name="kirim">kirim</button>
    </form>
</body>
</html>