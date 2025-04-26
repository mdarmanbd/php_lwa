<?php
// echo $_POST['name'] . "<br>";
// echo $_POST['email'] . "<br>";

$number = $_POST['number'];


for($i = 1; $i <= $number; $i++){
    for($j = 1; $j <= $i; $j++){
        echo $j . " " ;
    }
    echo "<br>";
}

?>