

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    $bill =$_POST["bill"];

?>
<body>
    <h1>Bilangan genap dan ganjil</h1>
    <hr>
    bilangan : <? $bill ?><br>
    <?php
    if($bill %2 == 0){
        echo "$bill adalah bilangan genap";
    }else{
        echo "$bill adalah bilangan ganjil";
    }
    
    ?>
</body>
</html>