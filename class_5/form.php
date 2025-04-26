

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=" " method="post">
        <!-- <lable>Nmae: </lable>
        <input type="text" name="name">
        <br><br>
        <lable>Email: </lable>
        <input type="text" name="email">
        <br><br> -->
        <lable>Number: </lable>
        <input type="text" name="number" value="<?php if(isset($_POST['number'])) {echo $_POST['number'];} ?>" autocomplete="off" autofocus>
        <br><br>
        <button type="submit">submit</button>
        <br>

    </form>

    <?php 
        if(isset($_POST['number'])){
            echo '<br>Output: <br>';
            $number = $_POST['number'];
            for($i = 1; $i <= $number; $i++){
                for($j = 1; $j <= $i; $j++){
                    echo $j . " " ;
                }
                echo "<br>";
            }
        }
    
    ?>

</body>
</html>