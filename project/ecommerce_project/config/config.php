<?php
$dbhost = 'localhost';
$dbname = 'ecommerce_project';
$dbuser = 'root';
$dbpass = '';

try{
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch( PDOException $e ){
    echo "Connection error :" . $e->getMessage();
}

define('SMTP_HOST', 'sandbox.smtp.mailtrap.io');
define('SMTP_PORT', '2525');
define('SMTP_USERNAME', 'f203c5a48a952a');
define('SMTP_PASSWORD', 'a79ab866b3f062');
define('SMTP_ENCRYPTION', 'tls');
define('SMTP_FROM', 'contact@example.com');



?>