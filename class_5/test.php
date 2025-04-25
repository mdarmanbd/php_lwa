<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="result.php" method="post">
        Enter Name: <br>
        <input type="text" name="visitor_name"><br><br>
        Enter Email: <br>
        <input type="text" name="visitor_email"><br><br>
        <button type="submit">Submit</button>
    </form> -->
    <form action="" method="post">
        Enter Value: <br>
        <input type="text" name="number" value="<?php if(isset($_POST['number'])) {echo $_POST['number'];} ?>" autocomplete="off" autofocus><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if(isset($_POST['number']))
    {
        echo '<br>Output: <br>';
        for($i=1;$i<=$_POST['number'];$i++) {
            for($j=1;$j<=$i;$j++) {
                echo $j.' ';
            }
            echo '<br>';
        }
    }
    ?>

</body>
</html>