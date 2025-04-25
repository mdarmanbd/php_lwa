<?php

// echo $_POST['visitor_name'];
// echo '<br>';
// echo $_POST['visitor_email'];

for($i=1;$i<=$_POST['number'];$i++) {
    for($j=1;$j<=$i;$j++) {
        echo $j.' ';
    }
    echo '<br>';
}