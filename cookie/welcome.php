<?php 

    if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])){
        header('location:login.php');
    }else{
        if($_COOKIE['username'] == 'admin' && $_COOKIE['password']){
            ?>
            <h3 style='color: green;'>Welcome to dashboard</h3>
            <a href='logout.php'>Logout</a>
            <?php
        }
        else{
            header('location: login.php');
        }
    }


?>