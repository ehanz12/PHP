<?php
//soal 11.1
$a =12;
$b = 1;
if($a < $b){
    echo "bilangan $b lebih besar dari bilangan $a";
}else{
    echo "bilangan $a lebih besar dari bilangan $b";
}
//soal 11.2
echo "<br>";
echo "<br>";
echo "$a <br>";
echo "$b <br>";

if($a < $b){
    echo "bilangan $b lebih besar dari bilangan $a";  
}else{
    echo "bilangan $a lebih besar dari bilangan $b";
}
//soal 11.3
echo "<br>";
echo "<br>";
$c = 12;
$d = 12;
echo "$c <br>";
echo "$d <br>";
if($c == $d){
    echo "bilangan $c sama dengan bilangan $d";
}else if($c < $d){
    echo "bilangan $d lebih besar dari bilangan $c";
}else{
    echo "bilangan $c lebih besar dari bilangan $d";
}
//soal 11.4
echo "<br>";
echo "<br>";

$e = 0;
switch($e){
    case 0:
        echo "$e sama dengan bilangan 0";
    break;
    case 2:
        echo "$e sama dengan bilangan 2";
    break;
    case 4:
        echo "$e sama dengan bilangan 4";
        break;
    default:
    echo "$e sama dengan bilangan $e";          
}
//soal 11.5

//MAKE WHILE
echo "<br>";
echo "<h3> cara 1 </h3>";
$i = 10;
while( $i <= 10){
    print $i++;
}
echo "<br>";
echo "<h3> cara 2 </h3>";
$h = 1;
while($h <= 10){
    print $h;
    $h++;
}

//soal 11.6
//MAKE DO WHILE
echo "<h3> cara 4 </h3>";
$z = 1;
do{
    echo "$z";
    $z++;
}while($z <=10);

//soal 11.7
//MAKE FOR
echo "<h3> cara 5 </h3>";

for($i = 1; $i <=10; $i++){
    echo "$i";
}

//soal 11.8
echo "<br>";
echo "<br>";
//
for($i = 1;$i <=10;$i++){
    if($i == 6){
        break;
        
    }
    echo "$i";
}


//soal 11.9
echo "<br>";
echo "bilangan ganjil <br>";
 for($i = 1;$i <=20;$i++){
    if(!($i%2)){
        continue;
    }
    echo "$i";
 }
?>