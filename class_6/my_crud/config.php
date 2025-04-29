<?php
$dbhost = 'localhost';
$dbname = 'php_b1';
$dbuser = 'root';
$dbpass = '';

try{
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch( PDOException $e ){
    echo "Connection error :" . $e->getMessage();
}
?>