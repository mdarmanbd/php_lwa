<?php 

ob_start();
session_start();
include "config/config.php";
unset($_SESSION['user']);
header('location: '.BASE_URL.'login.php');
$_SESSION['success_message'] = 'You have successfully logged out';
exit;


?>