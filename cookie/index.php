
<?php 

if(isset($_POST['form1'])){
    setcookie('pr', $_REQUEST['person'], time() + (86400));
    header("location:index.php");
}

if(isset($_POST['form2'])){
    setcookie('pr','', time()-1);
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_COOKIE['pr'])){
            echo "you selet a vote ". $_COOKIE['pr']. " successfully";
        }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Select person to vote: </td>
                <td>
                    <select name="person">
                        <option>Santo</option>
                        <option>Rafi</option>
                        <option>Mamun</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="form1" value="Submit">
                    <input type="submit" name="form2" value="Delete Vote">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>